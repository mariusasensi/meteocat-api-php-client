# [Meteo.cat](https://www.meteo.cat) API Client
An **unofficial** PHP client for easy use of the [Meteo.cat API REST](https://apidocs.meteocat.gencat.cat/).

Documentation of the API can be found at [https://apidocs.meteocat.gencat.cat/documentacio/](https://apidocs.meteocat.gencat.cat/documentacio/).

As the documentation indicates, to use this provider it is necessary to request the _access token_ from this [form](https://apidocs.meteocat.gencat.cat/documentacio/acces-ciutada-i-administracio/). 

### About the provider
- [_Servei Meteorològic de Catalunya_](http://www.meteo.cat/).
- [Wikipedia](https://en.wikipedia.org/wiki/Meteorological_Service_of_Catalonia). 

### Installation
The best way to install the client is through dependency manager [Composer](https://getcomposer.org/):

```bash
$ composer require mariusasensi/meteocat-api-php-client
```
or
```json
{
    "require": {
        "mariusasensi/meteocat-api-php-client": "^1.0"
    }
}
```

### Usage
```
TODO
```

### Operation query types
| Type                  | Query class name | Documentation                                                                                                                        | Description (CA)                                           |
|-----------------------|------------------|--------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------|
| XEMA - Representative | Station          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable) | Estacions representatives per a un municipi i una variable |
| XEMA - Representative | VariableMetadata | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables)                                     | Metadades de variables                                     |
| XEMA - Station        | All              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-de-totes-les-estacions)                       | Metadades de totes les estacions                           |
| XEMA - Station        | Get              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-duna-estacio)                                 | Metadades d'una estació                                    |
