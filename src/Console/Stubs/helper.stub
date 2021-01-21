<?php

use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;


// Start Users / Auth Helpers

if (!function_exists("getUserIP")) {
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
}


if (!function_exists('is_user_online')) {
    function is_user_online($user_id)
    {
        if (cache()->has('user-is-online-' . $user_id))
            return true;
        else
            return false;
    }
}

if (!function_exists('user')) {
    function user($guard = 'web')
    {
        if (!Auth::check()) {
            return false;
        }

        return auth($guard)->user();
    }
}

if (!function_exists('id')) {
    function id($guard = 'web')
    {
        return auth($guard)->id();
    }
}

if (!function_exists('username')) {
    function username($guard = 'web')
    {
        return auth($guard)->user()->username;
    }
}

if (!function_exists('email')) {
    function email($guard = 'web')
    {
        return auth($guard)->user()->email;
    }
}

/**
 * Return true if current user is logged, otherwise return false.
 * @return bool
 */
function userIsLogged($guard = 'web'): bool
{
    if (Auth::guard($guard)->guest()) {
        return false;
    }

    return true;
}


// End Users / Auth Helpers


if (!function_exists("isActive")) {
    function isActive($key, $class = 'active')
    {
        if (is_array($key)) {
            return in_array(Route::currentRouteName(), $key) ? $class : '';
        }
        return Route::currentRouteName() == $key ? $class : '';
    }
}

if (!function_exists("convertToEastern")) {
    function convertToEastern($string)
    {
        $eastern = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        return str_replace($western, $eastern, $string);
    }
}

if (!function_exists("convertToWestern")) {
    function convertToWestern($string)
    {
        $eastern = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
        $western = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        return str_replace($eastern, $western,  $string);
    }
}


if (!function_exists("createOPTCode")) {
    function createOPTCode()
    {
        return random_int(100000, 999999);
    }
}

if (!function_exists("createEmailToken")) {
    function createEmailToken()
    {
        return Str::random(60);
    }
}


if (!function_exists('generateToken')) {
    function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');

        // Illuminate\Support\Str;
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }
}

if (!function_exists('decodeBase64File')) {
    function decodeBase64File($encodedFile)
    {
        // اینجا اطلاعات اضافی رو پاک میکنم تا کد اصلی رو بگیرم
        $file = str_replace(' ', '+', $encodedFile);
        $file = substr($file, strpos($file, ';base64,') + 8);
        $decodedFile = base64_decode($file);

        // با کمک توابع پی اچ پی، مشخصات فایل رو بررسی می کنم
        $fileMimeType = finfo_buffer(finfo_open(), $decodedFile, FILEINFO_MIME_TYPE);
        $fileExt = substr($fileMimeType, strpos($fileMimeType, '/') + 1);

        return [
            'file' => $decodedFile, // فایل آماده برای ذخیره سازی در دیسک
            'mime'  => $fileMimeType, // نوع فایل
            'ext'   => $fileExt, // اکستنشن فایل
            'size'  => (int)strlen($decodedFile) // حجم فایل با واحد بایت
        ];
    }
}

/**
 * Helpers to Validate some data with laravel validator.
 *
 * @param string|array $fields
 * @param string|array $rules
 *
 * @return bool
 */
function validate($fields, $rules): bool
{
    if (!is_array($fields)) {
        $fields = ['default' => $fields];
    }

    if (!is_array($rules)) {
        $rules = ['default' => $rules];
    }

    return Validator::make($fields, $rules)->passes();
}

if (!function_exists('locale')) {
    function locale(): string
    {
        $locale = app()->getLocale();
        if (!$locale) {
            return config('app.fallback_locale');
        }

        return $locale;
    }
}


function queries($last = false, $dbConnectionName = '')
{
    if ($dbConnectionName != '') {
        $queries = DB::connection($dbConnectionName)->getQueryLog();
    } else {
        $queries = DB::getQueryLog();
    }

    foreach ($queries as &$query) {
        $query['look'] = query_interpolate($query['query'], $query['bindings']);
    }

    if ($last) {
        return end($queries);
    }
    return $queries;
}

/**
 * Echo log of database queries
 *
 * @return string
 */
function query_table(): string
{
    $queries = queries();
    $html = '<table style="background-color: #FFFF00;border: 1px solid #000000;color: #000000;padding-left: 10px;padding-right: 10px;width: 100%;">';
    foreach ($queries as $query) {
        $html .= '<tr style="border-top: 1px dashed #000000;"><td style="padding:8px;">' . e($query['look']) . '</td><td style="padding:8px;">' . e($query['time']) . '</td></tr>';
    }

    return $html . '</table>';
}

/**
 * Replaces any parameter placeholders in a query with the value of that
 * parameter. Useful for debugging. Assumes anonymous parameters from
 * $params are are in the same order as specified in $query
 * @author glendemon
 *
 * @param string $query The sql query with parameter placeholders
 * @param array $params The array of substitution parameters
 * @return string The interpolated query
 */
function query_interpolate($query, $params)
{
    $keys = array();
    $values = $params;
    foreach ($params as $key => $value) {
        if (is_string($key)) {
            $keys[] = '/:' . $key . '/';
        } else {
            $keys[] = '/[?]/';
        }
        if (is_array($value)) {
            $values[$key] = implode(',', $value);
        }
        if (is_null($value)) {
            $values[$key] = 'NULL';
        }
    }
    // Walk the array to see if we can add single-quotes to strings
    array_walk($values, function (&$v) {
        if (!is_numeric($v) && $v != "NULL") $v = "'" . $v . "'";
    });
    $query = preg_replace($keys, $values, $query, 1, $count);
    return $query;
}

if (!function_exists('humanFilesize')) {
    function humanFilesize()
    {
        return function ($value, $precision = 1): string {
            if ($value >= 1000000000000) {
                $value = round($value / (1024 * 1024 * 1024 * 1024), $precision);
                $unit  = 'TB';
            } elseif ($value >= 1000000000) {
                $value = round($value / (1024 * 1024 * 1024), $precision);
                $unit  = 'GB';
            } elseif ($value >= 1000000) {
                $value = round($value / (1024 * 1024), $precision);
                $unit  = 'MB';
            } elseif ($value >= 1000) {
                $value = round($value / (1024), $precision);
                $unit  = 'KB';
            } else {
                $unit = 'Bytes';
                return number_format($value) . ' ' . $unit;
            }

            return number_format($value, $precision) . ' ' . $unit;
        };
    }
}

if (!function_exists('url')) {

    function url(): callable
    {
        return function ($value = null): ?string {
            if ($value && !Str::startsWith($value, ['http://', 'https://'])) {
                $value = 'https://' . $value;
            }

            return $value;
        };
    }
}


class ImageRequest extends FormRequest
{
    use ConvertsBase64ToFiles;

    protected function base64FileKeys(): array
    {
        return [
            'jpg_image' => 'Logo.jpg',
        ];
    }

    public function rules()
    {
        return [
            'jpg_image' => ['required', 'file', 'image'],
        ];
    }
}


trait ConvertsBase64ToFiles
{
    protected function base64FileKeys(): array
    {
        return [];
    }

    /**
     * Pulls the Base64 contents for each image key and creates
     * an UploadedFile instance from it and sets it on the
     * request.
     *
     * @return void
     */
    function prepareForValidation()
    {
        Collection::make($this->base64FileKeys())->each(function ($filename, $key) {
            rescue(function () use ($key, $filename) {
                $base64Contents = $this->input($key);

                if (!$base64Contents) {
                    return;
                }

                // Generate a temporary path to store the Base64 contents
                $tempFilePath = tempnam(sys_get_temp_dir(), $filename);

                // Store the contents using a stream, or by decoding manually
                if (Str::startsWith($base64Contents, 'data:') && count(explode(',', $base64Contents)) > 1) {
                    $source = fopen($base64Contents, 'r');
                    $destination = fopen($tempFilePath, 'w');

                    stream_copy_to_stream($source, $destination);

                    fclose($source);
                    fclose($destination);
                } else {
                    file_put_contents($tempFilePath, base64_decode($base64Contents, true));
                }

                $uploadedFile = new UploadedFile($tempFilePath, $filename, null, null, true);

                $this->request->remove($key);
                $this->files->set($key, $uploadedFile);
            }, null, false);
        });
    }
}
