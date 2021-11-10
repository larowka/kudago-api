# PHP KudaGo API

PHP wrapper for [KudaGo API](https://docs.kudago.com/api/) base on Guzzle Http Client

## Requirements

* PHP 7.3 or later

## Installation

Via [Composer](https://getcomposer.org/):

```bash
$ composer require larowka/kudago-api
```

or you can update your composer.json file:

```json
{
    "require": {
      "larowka/kudago-api": "0.2.*"
    }
}
```

### Laravel
### Lumen

## Usage examples

### Create API Wrapper instance

```php
use Larowka\KudaGo\Api;

$kudago = new Api();
```

### Traits

Some entities have common traits for sorting, details, filter by time or coordinates, and paginator.
Use IDE annotations or [official documentation](https://docs.kudago.com/api/#) for allowed arguments.

```php
$events = $kudago->events();

// Sorting
$events->orderBy('id', '-publication_date') // Order by id ASC and by publication_date DESC
        ->get();

// Details
$events->expand('images', 'dates') // Get detailed information of images and dates in result
        ->get();

// Filter by time
$events->before('2022', '!Y')    // Get results between 2021-10-12 and 2022 year
        ->after('2021-10-12', 'Y-m-d')
        ->get();

// Filter by coordinates
$events->inRadius(59.9, 30.3, 10000) // Include only events in radius 10000 meters around point [latitude, longitude]
        ->get();

// Paginator
$events->page(3) // Page number
        ->pageSize(35) // Items on page
        ->get();
        
// Concrete object
$events->find(161043); // find by event ID
```

### API Endpoints

##### Object categories ([doc](https://docs.kudago.com/api/#page:категории-объектов))

```php
```

##### Locations ([doc](https://docs.kudago.com/api/#page:города))

> traits: Sort

```php
$locations = $kudago->locations();

$cities = $locations->orderBy('timezone')
                    ->get();
$city = $locations->find('spb');
```

##### Search ([doc](https://docs.kudago.com/api/#page:поиск))

> traits: Paginator, Details, CoordsFilter   

```php
$kudago->search()
        ->query('art') // Query string
        ->type('event') // Include only specific type: news, event, place, list
        ->expand('place', 'dates')
        ->get();
```

##### Events ([doc](https://docs.kudago.com/api/#page:события))

> traits: Paginator, Sort, Details, TimeFilter, CoordsFilter

```php
$kudago->events()
        ->after('2021-10-11')
        ->orderBy('-publication_date')
        ->page(5)
        ->pageSize(50)
        ->get();
```

##### Events of the day ([doc](https://docs.kudago.com/api/#page:события-дня))

```php
```

##### News ([doc](https://docs.kudago.com/api/#page:новости))

```php
```

##### Lists ([doc](https://docs.kudago.com/api/#page:подборки))

> traits: Paginator, Sort, Details

```php
$kudago->lists()
        ->get();
```

##### Places ([doc](https://docs.kudago.com/api/#page:места))

> traits: Paginator, Sort, Details, TimeFilter, CoordsFilter

```php
$kudago->places()
        ->ids(157,33338) // Include only specific places by placeID
        ->get();
```

##### Movies ([doc](https://docs.kudago.com/api/#page:фильмы))

> traits: Paginator, Sort, Details, TimeFilter

```php
$kudago->movies()
        ->get();
```

##### Showings ([doc](https://docs.kudago.com/api/#page:показы))

> traits: Paginator, Sort, Details, TimeFilter

```php
$kudago->showings()
        ->inPlace(19757) // Include only showings in specific place
        ->get();
```

##### Movie Showings ([doc](https://docs.kudago.com/api/#page:фильмы,header:фильмы-список-показов-фильма))

> traits: Paginator, Sort, Details, TimeFilter

```php
$kudago->movieShowings(3315)
        ->inPlace(19757) // Include only showings in specific place
        ->get();
```

##### Agents ([doc](https://docs.kudago.com/api/#page:агенты))

```php
$kudago->agents()
        ->get();
```

##### Agent Roles ([doc](https://docs.kudago.com/api/#page:роли))

```php
$kudago->agentRoles(614)
        ->get();
```
