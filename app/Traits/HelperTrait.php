<?php namespace App\Traits;

use App\Property;
use Carbon\Carbon;
use GuzzleHttp;
use Spatie\Geocoder\Geocoder;

trait HelperTrait
{
  public function geocode(Property $property)
  {
    $client = new GuzzleHttp\Client();
    $geocoder = new Geocoder($client);
    return $geocoder->getCoordinatesForAddress($property->full_address);
  }
}