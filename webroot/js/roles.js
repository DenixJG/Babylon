$(document).ready(function () {
    initOpenModal();
});

function initModalEvents(modal) {
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
}

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
        }).then(function (response) {
            $(`#${response.action}-modal-content`).html(response.content);

            initModalEvents(modal);
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

    let data = Utils.formDataToObject(formData);

    // FIXME: When send data to server, the data is not sent
    // correctly, the data is sent as [object Object]
    Utils.sendAjaxRequest("/roles/ajax", {
        method: "POST",
        action: "save-role-data",
        data: data,
        dataType: "json",
    }).then(function (response) {
        console.log(response);

        if (response.status === 200) {
            $(`.modal.${response.modal_class}`).modal("hide");
            Utils.showToast("success", response.message);

            window.location.reload();
        } else {
            $(`#${response.action}-modal-content`).html(response.content);
            Utils.showToast("error", response.message);
        }
    });
}

function updateRolesList() {
    Utils.sendAjaxRequest("/roles/ajax", {
        method: "POST",
        action: "update-roles-list",
        dataType: "json",
    }).then(function (response) {
        $("#roles-list").html(response.content);
    });
}
