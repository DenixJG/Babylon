$(document).ready(function () {
    initOpenModal();
});

function initOpenModal() {
    $(".modal").on("hidden.bs.modal", function (event) {
        $(this).find(".modal-dialog").html("");
    });

    $(".modal").on("show.bs.modal", function (event) {
        let action = $(this).data("custom-action");
        let btn = $(event.relatedTarget);

        Utils.sendAjaxRequest("/roles/ajax", {
            method: "POST",
            action: action,
            data: {
                role_id: $(btn).data("role-id"),
            },
            dataType: "html",
        }).then(function (response) {
            $("#roles-modal-content").html(response);
        });
    });
}
