<?php
/**
 * Created by PhpStorm.
 * User: thao.truong
 * Date: 04.03.18
 * Time: 12:24
 */

/**
 * @param float $lat
 * @param float $lng
 * @return string
 */
function getCountry($lat, $lng) : string {
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($lat) . ',' . trim($lng);
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;

    if ($status == "OK") {
        return array_reduce($data->results[0]->address_components, function($carry, $item) {
            if ($item->types[0] === 'country') {
                $carry = $item->long_name;
            }

            return $carry;
        });
    }

    return '';
}

/**
 * @param float $distanceInMeters
 * @return string
 */
function formatDistance($distanceInMeters) : string {
    return '~' . round($distanceInMeters / 1000, 1) . ' km';
}