$(document).ready(function () {
    initShortcuts();

    initSearchBtnEvents();

    initAddToLibraryBtnEvents();
});

/**
 * Initialize all events listeners for search button
 */
function initSearchBtnEvents() {
    $("#btn-search").off("click");
    $("#btn-search").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();

        let search = $("#search-input").val() || "";
        if (search.length <= 1) {
            return;
        }

        const form = $(this).closest("form");
        let searchParmas = Utils.formatUrlParams({ q: search });

        form.attr("action", "/tmdb/search" + searchParmas);
        form.submit();

        return;
    });

    // Evento for enter key
    $("#search-input").off("keypress");
    $("#search-input").on("keypress", function (event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            event.stopPropagation();

            $("#btn-search").trigger("click");
        }
    });
}

/**
 * Focus on search input and select all text
 */
function focusSearchInput() {
    $("#search-input").focus();
    $("#search-input").select();
}

/**
 * Initialize all shortcuts for this page
 */
function initShortcuts() {
    hotkeys("alt+l", function (event, handler) {
        focusSearchInput();
    });
}

/**
 * Add a resource to global library
 *
 * @param {Object} result Result from sweetalert
 * @param {*} params Params pased to callback function
 * @returns
 */
async function addMovieToLibrary(result, params) {
    const callbackResponse = new CallbackResponse(false);

    if (!result.isConfirmed) {
        return callbackResponse;
    }

    const tmdbId = params.tmdbId || null;
    if (!tmdbId) {
        callbackResponse.setMessage("Invalid TMDB ID");
        return callbackResponse;
    }

    Utils.showLoading(params.cardTarget);
    const response = await Utils.sendAjaxRequest("/tmdb/add-to-library", {
        method: "POST",
        dataType: "json",
        action: "add-to-library",
        data: {
            tmdbId: params.tmdbId,
            mediaType: params.mediaType,
        },
    });
    Utils.hideLoading(params.cardTarget);

    // If response is not successful then display error message
    if (!response.success) {
        callbackResponse.setMessage(response.message);
        return callbackResponse;
    }

    callbackResponse.setSuccess(true);
    callbackResponse.setMessage(response.message);

    return callbackResponse;
}

/**
 * Initialize all events listeners for btn-add-to-library
 */
function initAddToLibraryBtnEvents() {
    $(".btn-add-to-library").off("click");
    $(".btn-add-to-library").on("click", function (event) {
        event.preventDefault();
        event.stopPropagation();

        Utils.sweetAlert(
            {
                title: "Add to library",
                text: "Are you sure you want to add this movie to your library?",
                icon: "info",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            },
            addMovieToLibrary,
            {
                tmdbId: $(this).data("tmdb-id"),
                mediaType: $(this).data("tmdb-media-type"),
                cardTarget: $(this).closest(".tmdb-result-card"),
            }
        );
    });
}
