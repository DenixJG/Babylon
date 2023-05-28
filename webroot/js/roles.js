$(document).ready(function () {
    initOpenModal();
});

function initOpenModal() {
    $(".modal").on("hidden.bs.modal", function () {
        $(this).find(".modal-dialog").html("");
    });

    $(".modal").on("show.bs.modal", function (event) {
        let modal = $(this);
        let action = $(this).data("custom-action");
        let btn = $(event.relatedTarget);

        Utils.sendAjaxRequest("/roles/ajax", {
            method: "POST",
            action: action,
            data: {
                role_id: $(btn).data("role-id"),
            },
            dataType: "json",
        }).then(async function (response) {
            await $("#roles-modal-content").html(response.content);

            // data-kt-roles-modal-action="cancel" hides the modal on click using jQuery
            // data-kt-roles-modal-action="close" hides the modal on click using jQuery
            $(modal)
                .find(
                    '[data-roles-modal-action="cancel"], [data-roles-modal-action="close"]'
                )
                .on("click", function (e) {
                    $(modal).modal("hide");
                });

            // data-kt-roles-modal-action="submit" submits the modal form using jQuery
            $(modal)
                .find('[data-roles-modal-action="submit"]')
                .on("click", function (e) {
                    // Get form element instance
                    let form = $(modal).find("form");

                    manageDataRole(form);
                });
        });
    });
}

/**
 * Manage roles data, send ajax request to server
 *
 * @param {object} formElement The form element to get data from
 */
function manageDataRole(formElement) {
    let formData = new FormData(formElement[0]);

    formData.append("action", "save-role-data");

    // FIXME: When send data to server, the data is not sent
    // correctly, the data is sent as [object Object]
    Utils.sendAjaxRequest("/roles/ajax", {
        method: "POST",
        action: undefined,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
    }).then(function (response) {
        console.log(response);
    });
}
