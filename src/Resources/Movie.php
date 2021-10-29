<?php

namespace Larowka\KudaGo\Resources;

use Larowka\KudaGo\Collections\{GenreCollection, ImageCollection};

/**
 * @method static Movie fromArray(array $data) Return an instance of Movie resource object
 *
 * @property int id                     идентификатор
 * @property string $site_url           адрес фильма на сайте kudago.com
 * @property int $publication_date      дата публикации
 * @property string $slug               слаг
 * @property string $title              название
 * @property string $description        описание
 * @property string $body_text          полное описание
 * @property bool $is_editors_choice    является ли выбоором редакции
 * @property int $favorites_count       число пользователей, добавивших фильм в избранное
 * @property GenreCollection $genres    список жанров
 * @property int $comments_count        число комментариев
 * @property string $original_title     оригинальное название
 * @property string $locale             язык оригинала
 * @property string $country            страна оригинала
 * @property int $year                  год выпуска
 * @property string $language           язык оригинала
 * @property float $running_time        продолжительность
 * @property string $budget_currency    бюджет (валюта)
 * @property float $budget              бюджет
 * @property string $mpaa_rating        рейтинг MPAA
 * @property string $age_restriction    возрастное ограничение
 * @property string $stars              актеры
 * @property string $director           режиссер
 * @property string $writer             сценарист
 * @property string $awards             награды
 * @property string $trailer            трейлер
 * @property ImageCollection $images    галерея картинок
 * @property Image $poster              постер
 * @property string $url                сайт фильма
 * @property string $imdb_url           ссылка на страницу фильма на imdb.com
 * @property string $imdb_rating        рейтинг фильма на сайте imdb.com
 */
class Movie extends AbstractResource
{
    public static array $attributes = [
        'id' => true,
        'site_url' => true,
        'publication_date' => true,
        'slug' => true,
        'title' => true,
        'description' => true,
        'body_text' => true,
        'is_editors_choice' => true,
        'favorites_count' => true,
        'genres' => GenreCollection::class,
        'comments_count' => true,
        'original_title' => true,
        'locale' => true,
        'country' => true,
        'year' => true,
        'language' => true,
        'running_time' => true,
        'budget_currency' => true,
        'budget' => true,
        'mpaa_rating' => true,
        'age_restriction' => true,
        'stars' => true,
        'director' => true,
        'writer' => true,
        'awards' => true,
        'trailer' => true,
        'images' => ImageCollection::class,
        'poster' => Image::class,
        'url' => true,
        'imdb_url' => true,
        'imdb_rating' => true,
        'disable_comments' => true
    ];
}
