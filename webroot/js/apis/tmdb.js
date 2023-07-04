$(document).ready(function () {
    initShortcuts();

    initSearchBtnEvents();
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

function focusSearchInput() {
    $("#search-input").focus();
    $("#search-input").select();
}

function initShortcuts() {
    hotkeys("alt+l", function (event, handler) {
        focusSearchInput();
    });
}
