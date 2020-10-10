jQuery(function () {
  $('#searchForm').on('submit', (e) => {
    let movieName = $('#searchText').val();
    getMovies(movieName);
    e.preventDefault();
  });

  $('#btn-search-movie').on('click', (e) => {
    let movieName = $('#searchText').val();
    if (movieName) {
      getMovies(movieName);
      e.preventDefault();
    }
  })

})

function getMovies(movieName) {
  axios.get('app/api/getMovies.php?movieName=' + movieName)
    .then((response) => {
      let movies = JSON.parse(response.data).Search;
      let output = '';
      $.each(movies, (index, movie) => {
        console.log(movie);
        output += `
            <div class="col-md-3 movie-card">
              <div class="well text-center">
                <img class="${ movie.Poster == 'N/A' ? 'img-thumbnail img-fluid' : '' }" 
                      src="${ movie.Poster == 'N/A' ? './public/img/default-thumbnail.jpg' : movie.Poster }">
                <h5>${movie.Title}</h5>
                <a onclick="movieSelected('${movie.imdbID}')" class="btn btn-primary" href="#">Movie Details</a>
              </div>
            </div>
          `;
      });

      $('#movies').html(output);
    })
    .catch((err) => {
      console.log(err);
    });
}

function getMovie() {
  let movieId = sessionStorage.getItem('movieId');

  axios.get('app/api/getInfoMovie.php?movieId=' + movieId)
    .then((response) => {
      let movie = JSON.parse(response.data);
      let output = `
          <div class="row">
            <div class="col-md-4">
              <img class="${ movie.Poster == 'N/A' ? 'img-thumbnail img-fluid' : '' }" 
                      src="${ movie.Poster == 'N/A' ? './public/img/default-thumbnail.jpg' : movie.Poster }">
            </div>
            <div class="col-md-8">
              <h2>${movie.Title}</h2>
              <ul class="list-group">
                <li class="list-group-item"><strong>Genre:</strong> ${movie.Genre}</li>
                <li class="list-group-item"><strong>Released:</strong> ${movie.Released}</li>
                <li class="list-group-item"><strong>Rated:</strong> ${movie.Rated}</li>
                <li class="list-group-item"><strong>IMDB Rating:</strong> ${movie.imdbRating}</li>
                <li class="list-group-item"><strong>Director:</strong> ${movie.Director}</li>
                <li class="list-group-item"><strong>Writer:</strong> ${movie.Writer}</li>
                <li class="list-group-item"><strong>Actors:</strong> ${movie.Actors}</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="well">
              <h3>Plot</h3>
              ${movie.Plot}
              <hr>
              <a href="http://imdb.com/title/${movie.imdbID}" target="_blank" class="btn btn-primary">View IMDB</a>
              <a href="index.php" class="btn btn-default">Go Back To Search</a>
            </div>
          </div>
        `;

      $('#movie').html(output);
    })
    .catch((err) => {
      console.log(err);
    });
}

function movieSelected(id) {
  sessionStorage.setItem('movieId', id);
  window.location = 'movie_info.php';
  return false;
}