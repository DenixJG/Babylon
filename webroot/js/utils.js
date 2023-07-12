/**
 * This class contains utility functions that can be used in any part of the application
 *
 * To use this class, you must include jQuery and SweetAlert2 in your html file. If you
 * want to use the sendAjaxRequest function, you must also include the csrfToken meta tag
 * in your html file into a meta tag with the name csrfToken.
 *
 * Example: `<meta name="csrfToken" content="csrfToken">`
 *
 * @class Utils
 * @author Rafael
 * @version 1.0.1
 */
class Utils {
    /**
     * Show a toast message using the toastr library
     *
     * This toast element has a default options that can be overriden by passing
     * an object as the last parameter.
     *
     * Usage:
     *
     * ```js
     * // Show a success message with the default options and no title
     * Utils.showToast("success", "This is a success message");
     *
     * // Show an info message with the default options and a title
     * Utils.showToast("info", "This is an error message", "Information");
     *
     * // Show a warning message with modified options and no title
     * Utils.showToast("warning", "This is a warning message", undefined, {
     *   closeButton: true,
     *   progressBar: true,
     *   timeOut: "5000",
     * });
     *
     * ```
     *
     *
     * @param {string} type The type of the message, can be `success`, `info`, `warning` or `error`
     * @param {string} message The message to show
     * @param {string|undefined} title The title of the message
     * @param {object} options The options to use for the toastr message
     *
     * @param {boolean} options.closeButton Show the close button
     * @param {boolean} options.debug Show the debug button
     * @param {boolean} options.newestOnTop Show the newest message on top
     * @param {boolean} options.progressBar Show the progress bar
     * @param {string} options.positionClass The position of the message
     * @param {boolean} options.preventDuplicates Prevent duplicate messages
     * @param {function} options.onclick The callback function when the message is clicked
     * @param {string} options.showDuration The duration of the show animation
     * @param {string} options.hideDuration The duration of the hide animation
     * @param {string} options.timeOut The duration of the message
     * @param {string} options.extendedTimeOut The duration of the message when the mouse is over it
     * @param {string} options.showEasing The easing of the show animation
     * @param {string} options.hideEasing The easing of the hide animation
     * @param {string} options.showMethod The method of the show animation
     * @param {string} options.hideMethod The method of the hide animation
     *
     * @throws {Error} If toastr is not loaded
     *
     * @returns {void}
     */
    static showToast(
        type,
        message,
        title = undefined,
        {
            closeButton = true,
            debug = false,
            newestOnTop = false,
            progressBar = false,
            positionClass = "toast-top-center",
            preventDuplicates = false,
            onclick = null,
            showDuration = "300",
            hideDuration = "1000",
            timeOut = "6000",
            extendedTimeOut = "1000",
            showEasing = "swing",
            hideEasing = "linear",
            showMethod = "fadeIn",
            hideMethod = "fadeOut",
        } = {}
    ) {
        // Check if toastr is loaded
        if (typeof toastr === "undefined") {
            throw new Error(
                "Utils.showToast requires toastr library to be loaded"
            );
        }

        toastr.options = {
            closeButton: closeButton,
            debug: debug,
            newestOnTop: newestOnTop,
            progressBar: progressBar,
            positionClass: positionClass,
            preventDuplicates: preventDuplicates,
            onclick: onclick,
            showDuration: showDuration,
            hideDuration: hideDuration,
            timeOut: timeOut,
            extendedTimeOut: extendedTimeOut,
            showEasing: showEasing,
            hideEasing: hideEasing,
            showMethod: showMethod,
            hideMethod: hideMethod,
        };

        const validTyes = ["success", "info", "warning", "error"];
        if (validTyes.includes(type)) {
            toastr[type](message, title);
        } else {
            toastr["warning"](
                'The type must be one of "success", "info", "warning" or "error"',
                "Invalid Type"
            );
        }
    }

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
     * @param {object} options The parameters to use for the sweet alert
     * @param {string} options.title The title of the sweet alert
     * @param {string} options.text The text of the sweet alert
     * @param {string} options.icon The icon to use for the sweet alert
     * @param {boolean} options.showCancelButton Whether to show the cancel button or not
     * @param {string} options.confirmButtonText The text to use for the confirm button
     * @param {string} options.cancelButtonText The text to use for the cancel button
     * @param {boolean} options.reverseButtons Whether to reverse the buttons or not
     * @param {boolean} options.showSweetAlert Whether to show the sweet alert or show a toast message instead
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
            showSweetAlert = false,
        } = {},
        callback = undefined,
        params = undefined
    ) {
        // Check if SweetAlert2 is loaded
        if (typeof Swal === "undefined") {
            throw new Error(
                "Utils.sweetAlert requires SweetAlert2 library to be loaded"
            );
        }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: showCancelButton,
            confirmButtonText: confirmButtonText,
            cancelButtonText: cancelButtonText,
            reverseButtons: reverseButtons,
        }).then(async (result) => {
            if (result.isConfirmed) {
                if (callback) {
                    let callbackReturn = await callback(result, params);

                    // Check if callback returns object of CallbackResponse
                    if (callbackReturn instanceof CallbackResponse) {
                        let { success, message, redirect } = callbackReturn;

                        if (success && showSweetAlert) {
                            Swal.fire(
                                "Success!",
                                message ||
                                    "Your action has been executed successfully.",
                                "success"
                            );

                            if (redirect !== undefined) {
                                window.location.href = redirect;
                            }
                        } else if (success && !showSweetAlert) {
                            Utils.showToast("success", message);

                            if (redirect !== undefined) {
                                window.location.href = redirect;
                            }
                        } else if (!success && showSweetAlert) {
                            Swal.fire(
                                "Error!",
                                message || "Your action has not been executed.",
                                "error"
                            );
                        } else if (!success && !showSweetAlert) {
                            Utils.showToast("error", message);
                        }
                    } else {
                        console.error(callbackReturn);
                        throw new Error(
                            "Callback function must return an instance of CallbackResponse"
                        );
                    }
                } else {
                    if (showSweetAlert) {
                        Swal.fire(
                            "Success!",
                            "Your action has been executed successfully.",
                            "success"
                        );
                    } else {
                        Utils.showToast(
                            "success",
                            "Your action has been executed successfully."
                        );
                    }
                }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                console.log("Cancel button clicked");
            }
        });
    }

    /**
     * Convert a FormData object to a plain object with key-value pairs
     *
     * If the FormData entries has format Roles[description] transform into
     * {Roles: { description: value }}
     *
     * @param {FormData} formData FormData object to convert to plain object
     * @returns {object} The plain object with key-value pairs
     */
    static formDataToObject(formData) {
        let object = {};

        if (formData instanceof FormData) {
            formData.forEach((value, key) => {
                if (key.includes("[") && key.includes("]")) {
                    const [parentKey, childKey] = key
                        .split(/\[(.*?)\]/)
                        .filter(Boolean);
                    if (!Reflect.has(object, parentKey)) {
                        object[parentKey] = {};
                    }
                    object[parentKey][childKey] = value;
                } else {
                    if (!Reflect.has(object, key)) {
                        object[key] = value;
                        return;
                    }

                    if (!Array.isArray(object[key])) {
                        object[key] = [object[key]];
                    }

                    object[key].push(value);
                }
            });
        }

        return object;
    }

    /**
     * Send a common ajax request to the server and handle the response
     *
     * If the request is successful, the callback function will be executed
     * with the response from the server as the parameter.
     *
     * To use this function, you must include jQuery in your html file.
     *
     * If you set params the url will be modified to include the params
     * in the url. For example, if the url is /users and the params is
     * {id: 1, name: "John"} the url will be /users?id=1&name=John
     *
     * @param {string} url The url to send the request to
     * @param {object} params The parameters to use for the request
     * @param {string} params.method The method to use for the request
     * @param {string} params.action The action to perform on the server
     * @param {object} params.data The data to send to the server
     * @param {string} params.dataType The type of data to expect from the server
     * @param {boolean} params.processData Whether to process the data or not
     * @param {string} params.contentType The type of content to send to the server
     * @param {object} params.params The parameters to pass to request
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
            processData = true,
            contentType = "application/x-www-form-urlencoded; charset=UTF-8",
            params = {},
        } = {},
        callback = undefined
    ) {
        // Check if jQuery is loaded
        if (typeof $ === "undefined") {
            throw new Error(
                "Utils.sendAjaxRequest requires jQuery library to be loaded"
            );
        }

        let customData = {};
        if (data instanceof FormData) {
            customData = Utils.formDataToObject(data);
        } else {
            customData = { action: action, data: data };
        }

        return $.ajax({
            url: url + Utils.formatUrlParams(params),
            type: method,
            processData: processData,
            contentType: contentType,
            data: customData,
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

    /**
     * Format the url parameters into a string of key-value pairs. This string is also
     * URL encoded to be used in the url of the request;
     *
     * If the params object contains keys like roles: [1, 2, 3] it will be formatted to
     * roles[]=1&roles[]=2&roles[]=3 or if the params object contains keys like roles: {description: "admin"}
     * it will be formatted to roles[description]=admin.
     *
     * @param {object} params The parameters to format
     * @returns {string} The formatted string of key-value pairs
     */
    static formatUrlParams(params = {}) {
        // Check if the params is an object
        if (typeof params !== "object") {
            return "";
        }

        // Check if the params is empty
        if (Object.keys(params).length === 0) {
            return "";
        }

        let formattedParams = "";

        // Loop through the params object
        for (const [key, value] of Object.entries(params)) {
            // Check if the value is an array
            if (Array.isArray(value)) {
                // Loop through the array
                for (const element of value) {
                    formattedParams += `${key}[]=${element}&`;
                }
            } else if (typeof value === "object") {
                // Loop through the object
                for (const [childKey, childValue] of Object.entries(value)) {
                    formattedParams += `${key}[${childKey}]=${childValue}&`;
                }
            } else {
                formattedParams += `${key}=${value}&`;
            }
        }

        // Remove the last character from the formattedParams string
        formattedParams = formattedParams.slice(0, -1);

        // Encode the formattedParams string
        formattedParams = encodeURI(formattedParams);

        return formattedParams !== "" ? `?${formattedParams}` : "";
    }

    /**
     * Show a loading overlay on the specified selector
     *
     * TODO: Add support for options parameter
     *
     * @param {*} selector JQuery selector to show the loading overlay on
     * @param {*} options The options to use for the loading overlay
     * @param {*} options.background The background color of the loading overlay
     */
    static showLoading(
        selector = "body",
        {
            image = "",
            background = "rgba(220, 220, 220, 0.3)",
            fontawesome = "fa fa-circle-notch fa-spin",
        } = {}
    ) {
        if (typeof $.LoadingOverlay === "undefined") {
            throw new Error(
                "Utils.showLoading requires jQuery plugin LoadingOverlay to be loaded"
            );
        }

        // Set the options
        const options = {
            background: background,
            fontawesome: fontawesome,
            image: image,
        };

        $(selector).LoadingOverlay("show", options);
    }

    /**
     * Hide the loading overlay on the specified selector
     *
     *
     * @param {*} selector JQuery selector to hide the loading overlay on
     * @param {*} force Whether to force all loading overlays to be hidden
     */
    static hideLoading(selector = "body", force = false) {
        if (typeof $.LoadingOverlay === "undefined") {
            throw new Error(
                "Utils.hideLoading requires jQuery plugin LoadingOverlay to be loaded"
            );
        }

        $(selector).LoadingOverlay("hide", force);
    }
}
