/**
 * This class contains utility functions that can be used in any part of the application
 *
 * To use this class, you must include jQuery and SweetAlert2 in your html file. If you
 * want to use the sendAjaxRequest function, you must also include the csrfToken meta tag
 * in your html file into a meta tag with the name csrfToken.
 *
 * Example: <meta name="csrfToken" content="csrfToken">
 *
 * @class Utils
 * @author Rafael
 * @version 1.0.0
 */
class Utils {
    /**
     * Show a sweet alert message box
     *
     * This function uses the SweetAlert2 library to show a message box and
     * execute a callback function after the user clicks the confirm button.
     *
     * If the callback function returns true, a success message will be shown.
     * If the callback function returns false, an error message will be shown.
     * If the callback function is not provided, a success message will be shown.
     * If the callback function does not return a boolean value, an error message will be shown.
     *
     * @param {object} params The parameters to use for the sweet alert
     * @param {string} params.title The title of the sweet alert
     * @param {string} params.text The text of the sweet alert
     * @param {string} params.icon The icon to use for the sweet alert
     * @param {boolean} params.showCancelButton Whether to show the cancel button or not
     * @param {string} params.confirmButtonText The text to use for the confirm button
     * @param {string} params.cancelButtonText The text to use for the cancel button
     * @param {boolean} params.reverseButtons Whether to reverse the buttons or not
     * @param {function} callback The callback function to execute after the user clicks the confirm button
     * @param {object} params The parameters to pass to the callback function
     *
     * @returns {void}
     */
    static sweetAlert(
        {
            title = "Are you sure?",
            text = "You won't be able to revert this!",
            icon = "warning",
            showCancelButton = true,
            confirmButtonText = "Yes, delete it!",
            cancelButtonText = "No, cancel!",
            reverseButtons = true,
        } = {},
        callback = undefined,
        params = undefined
    ) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: showCancelButton,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
            reverseButtons: reverseButtons,
        }).then((result) => {
            if (result.isConfirmed) {
                if (callback) {
                    let callbackReturn = callback(result, params);
                    if (typeof callbackReturn === "boolean") {
                        if (callbackReturn) {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                        } else {
                            Swal.fire(
                                "Error deleting!",
                                "Your file has not been deleted. You can try again.",
                                "error"
                            );
                        }
                    } else {
                        throw new Error(
                            "The callback function must return a boolean value"
                        );
                    }
                } else {
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                );
            }
        });
    }

    /**
     * Send a common ajax request to the server and handle the response
     *
     * If the request is successful, the callback function will be executed
     * with the response from the server as the parameter.
     *
     * To use this function, you must include jQuery in your html file.
     *
     * @param {string} url The url to send the request to
     * @param {string} params.method The method to use for the request
     * @param {string} params.action The action to perform on the server
     * @param {object} params.data The data to send to the server
     * @param {string} params.dataType The type of data to expect from the server
     * @param {function} callback The callback function to execute after the request is successful
     *
     * @returns {Promise} The promise object representing the response from the server
     */
    static sendAjaxRequest(
        url,
        {
            method = "GET",
            action = "empty",
            data = undefined,
            dataType = "json",
        } = {},
        callback = undefined
    ) {
        return $.ajax({
            url: url,
            method: method,
            data: {
                action: action,
                data: data,
            },
            dataType: dataType,
            /**
             * @param {XMLHttpRequest} xhr
             */
            beforeSend: function (xhr) {
                xhr.setRequestHeader(
                    "X-CSRF-Token",
                    $('meta[name="csrfToken"]').attr("content")
                );
            },
            success: function (response) {
                if (callback) {
                    callback(response);
                }
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
}