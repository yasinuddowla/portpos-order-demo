<?php
// request methods
define('GET', 'GET');
define('POST', 'POST');
define('PATCH', 'PATCH');

// order status
define('ORDER_PENDING', 'pending');
define('ORDER_PAID', 'paid');
define('ORDER_FULFILLED', 'fulfilled');
define('ORDER_REFUND', 'refund');

/* API RESPONSE STATUS, CODES, MESSAGES */

define('SUCCESS_RESPONSE', 200);

/*Error Codes*/
define('OK_BAD_REQUEST', ['status' => 200, 'code' => 400, 'msg' => 'Invalid request data.']);
define('BAD_REQUEST', ['status' => 400, 'code' => 400, 'msg' => 'Invalid request data.']);
define('REQUEST_NOT_FOUND', ['status' => 404, 'code' => 404, 'msg' => 'Request not found.']);
define('REQUEST_METHOD_NOT_VALID', ['status' => 405, 'code' => 405, 'msg' => 'Request method not valid.']);


define('USER_INSERT_FAILURE', ['status' => 400, 'code' => 110, 'msg' => 'User registration failed.']);
define('USER_UPDATE_FAILURE', ['status' => 400, 'code' => 111, 'msg' => 'User information update failed.']);
define('USER_NOT_FOUND', ['status' => 400, 'code' => 112, 'msg' => 'User not found.']);

define('ITEM_INSERT_FAILURE', ['status' => 200, 'code' => 113, 'msg' => 'Not created.']);
define('ITEM_DELETE_FAILURE', ['status' => 200, 'code' => 114, 'msg' => 'Not deleted.']);
define('ITEM_UPDATE_FAILURE', ['status' => 200, 'code' => 115, 'msg' => 'Update failed.']);
define('ITEM_NOT_FOUND', ['status' => 200, 'code' => 116, 'msg' => 'Not found.']);


define('UNAUTHORIZED', ['status' => 401, 'code' => 401, 'msg' => 'Unauthorized.']);
define('FORBIDDEN', ['status' => 403, 'code' => 403, 'msg' => 'Access forbidded.']);
define('SERVER_ERROR', ['status' => 500, 'code' => 500, 'msg' => 'Internel Server Error.']);
/*Server Errors*/

define('JWT_PROCESSING_ERROR', ['status' => 400, 'code' => 301, 'msg' => 'Invalid request data.']);
define('AUTHORIZATION_HEADER_NOT_FOUND', ['status' => 400, 'code' => 302, 'msg' => 'Invalid request data.']);
define('ACCESS_TOKEN_ERRORS', ['status' => 400, 'code' => 303, 'msg' => 'Invalid request data.']);
