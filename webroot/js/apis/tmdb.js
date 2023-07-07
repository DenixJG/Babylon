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

function testSweetAlert(result, params) {
    const callbackResponse = new CallbackResponse(true);
    
    console.log(result);
    console.log(params);

    callbackResponse.setMessage("Movie added to library successfully");    
    
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

        Utils.sweetAlert({
            title: "Add to library",
            text: "Are you sure you want to add this movie to your library?",
            icon: "info",
        }, testSweetAlert)
    });
}
