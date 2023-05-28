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
            dataType: "html",
        }).then(async function (response) {
            await $("#roles-modal-content").html(response);

            // data-kt-roles-modal-action="cancel" hides the modal on click using jQuery
            $(modal)
                .find('[data-kt-roles-modal-action="cancel"]')
                .on("click", function () {
                    $(modal).modal("hide");
                });

            // data-kt-roles-modal-action="submit" submits the modal form using jQuery
            $(modal)
                .find('[data-kt-roles-modal-action="submit"]')
                .on("click", function () {
                    // Get form element instance
                    let form = $(modal).find("form");

                    manageDataRole(form);
                });
        });
    });
}

/**
 * Manage roles data, send ajax request to server
 */
function manageDataRole(formElement) {
    $(formElement).on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData($(formElement
            t));
        console.log(formData);
        return;
        Utils.sendAjaxRequest("/roles/ajax", {
            method: "POST",
            action: "update-role",
            data: formData,
            dataType: "json",
        }).then(function (response) {
            console.log(response);
        });
    });
}
