$(document).ready(function () {
    onBtnDeleteMovieClick();
});

/**
 * Handle click on button delete movie in list movies
 */
function onBtnDeleteMovieClick() {
    $(".btn-delete-movie").off("click");
    $(".btn-delete-movie").on("click", function () {
        Utils.sweetAlert(
            {
                title: "Delete movie",
                text: "Are you sure you want to delete this movie?",
                icon: "warning",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            },
            deleteMovie,
            {
                movieId: $(this).data("movie-id"),
            }
        );
    });
}

async function deleteMovie(result, params) {
    const callbackResponse = new CallbackResponse(false);

    if (!result.isConfirmed) {
        return callbackResponse;
    }

    const movieId = params.movieId || null;
    if (!movieId) {
        callbackResponse.setMessage("Invalid movie ID");
        return callbackResponse;
    }

    Utils.showLoading();
    const response = await Utils.sendAjaxRequest("/movies/delete", {
        method: "DELETE",
        dataType: "json",
        action: "delete-movie",
        data: {
            movieId: params.movieId,
        },
    });
    Utils.hideLoading();

    // If response is not successful then display error message
    if (!response.success) {
        callbackResponse.setMessage(response.message);
        return callbackResponse;
    }

    callbackResponse.setSuccess(true);
    callbackResponse.setMessage(response.message);

    if (response.redirect !== undefined) {
        callbackResponse.setRedirect(response.redirect);
    }

    return callbackResponse;
}
