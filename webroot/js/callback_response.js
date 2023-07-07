/**
 * This class represents a response from a callback function, the response
 * contains a success boolean, a message string and a data object.
 *
 * This class is designed to be used in {@link Utils.sweetAlert} function but
 * it can be used anywhere else in the code.
 *
 * Usage:
 *
 * ```js
 * function saveUser(result, params) {
 *    // If the user was saved successfully
 *    return new CallbackResponse(true, "User saved successfully");
 *
 *    // If the user was not saved successfully
 *    return new CallbackResponse(false, "User was not saved successfully");
 * }
 *
 * Utils.sweetAlert({ options }, saveUser, { params });
 *
 * ```
 *
 */
class CallbackResponse {
    /**
     * Create a new CallbackResponse instance
     *
     * @param {boolean} success Whether the callback function was successful or not
     * @param {string} message The message to display to the user
     * @param {object} data The data to pass to the callback function
     */
    constructor(success, message, data = {}) {
        this.success = success;
        this.message = message;
        this.data = data;
    }

    /**
     * Set the success status of the callback function
     *
     * @param {boolean} success
     */
    setSuccess(success) {
        this.success = success;
    }

    /**
     * Set the message to display to the user
     *
     * @param {string} message
     */
    setMessage(message) {
        this.message = message;
    }

    /**
     * Set the data to pass to the callback function
     *
     * @param {object} data
     */
    setData(data) {
        this.data = data;
    }

    /**
     * Get the success status of the callback function
     *
     * @returns {boolean} The success status of the callback function
     */
    getSuccess() {
        return this.success;
    }

    /**
     * Get the message to display to the user
     *
     * @returns {string} The message to display to the user
     */
    getMessage() {
        return this.message;
    }

    /**
     * Get the data to pass to the callback function
     *
     * @returns {object} The data to pass to the callback function
     */
    getData() {
        return this.data;
    }
}
