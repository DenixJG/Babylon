$(document).ready(function () {
    onBtnDeleteShowClick();
});

/**
 * Handle click on button delete show in list shows
 */
function onBtnDeleteShowClick() {
    $(".btn-delete-show").off("click");
    $(".btn-delete-show").on("click", function () {
        Utils.sweetAlert(
            {
                title: "Delete show",
                text: "Are you sure you want to delete this show?",
                icon: "warning",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            },
            deleteShow,
            {
                showId: $(this).data("show-id"),
            }
        );
    });
}

async function deleteShow(result, params) {
    const callbackResponse = new CallbackResponse(false);

    if (!result.isConfirmed) {
        return callbackResponse;
    }

    const showId = params.showId || null;
    if (!showId) {
        callbackResponse.setMessage("Invalid show ID");
        return callbackResponse;
    }

    Utils.showLoading();
    const response = await Utils.sendAjaxRequest("/shows/delete", {
        method: "DELETE",
        dataType: "json",
        action: "delete-show",
        data: {
            showId: params.showId,
        },
    });
    Utils.hideLoading();

    if (!response.success) {
        callbackResponse.setMessage(response.message);
        return callbackResponse;
    }

    callbackResponse.setSuccess(true);
    callbackResponse.setMessage(response.message);

    // If the response has a redirect URL then set it
    if (response.redirect !== undefined) {
        callbackResponse.setRedirect(response.redirect);
    }

    return callbackResponse;
}
