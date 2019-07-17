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
| Type | Subtype                  | Query class name             | Documentation                                                                                                                             | Description (CA)                                              |
|------|--------------------------|------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------|
| XEMA | Representative           | GetStationByCity             | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable)      | Estacions representatives per a un municipi i una variable    |
| XEMA | Representative           | GetAllVariableMetadata       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables)                                          | Metadades de variables                                        |
| XEMA | Stations                 | All                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-de-totes-les-estacions)                            | Metadades de totes les estacions                              |
| XEMA | Stations                 | Get                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-duna-estacio)                                      | Metadades d'una estació                                       |
| XEMA | Measurement              | GetByDay                     | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#dades-duna-variable-per-a-totes-les-estacions)                   | Dades d'una variable per a totes les estacions                |
| XEMA | Measurement              | Last                         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#ultimes-dades-duna-variable-per-a-totes-les-estacions)           | Últimes dades d'una variable per a totes les estacions        |
| XEMA | Measurement              | AllByStation                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-les-variables-duna-estacio)                         | Metadades de les variables d'una estació                      |
| XEMA | Measurement              | GetByStation                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable-duna-estacio)                            | Metadades d'una variable d'una estació                        |
| XEMA | Measurement              | All                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-totes-les-variables)                                | Metadades de totes les variables                              |
| XEMA | Measurement              | Get                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable)                                         | Metadades d'una variable                                      |
| XEMA | Statistic                | GetYearlyByVariable          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-anuals-duna-variable-per-a-totes-les-estacions)   | Estadístics anuals d'una variable per a totes les estacions   |
| XEMA | Statistic                | GetMonthlyByVariable         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-mensuals-duna-variable-per-a-totes-les-estacions) | Estadístics mensuals d'una variable per a totes les estacions |
| XEMA | Statistic                | GetDailyByVariable           | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-diaris-duna-variable-per-a-totes-les-estacions)   | Estadístics diaris d'una variable per a totes les estacions   |
| XEMA | Statistic                | GetYearlyMetadata            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals)                                | Metadades d'estadístics anuals                                |
| XEMA | Statistic                | GetYearlyMetadataByVariable  | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-per-variable)                   | Metadades d'estadístics anuals per variable                   |
| XEMA | Statistic                | GetMonthlyMetadata           | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals)                              | Metadades d'estadístics mensuals                              |
| XEMA | Statistic                | GetMonthlyMetadataByVariable | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-per-variable)                 | Metadades d'estadístics mensuals per variable                 |
| XEMA | Statistic                | GetDailyMetadata             | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris)                                | Metadades d'estadístics diaris                                |
| XEMA | Statistic                | GetDailyMetadataByVariable   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-per-variable)                   | Metadades d'estadístics diaris per variable                   |
| XEMA | Statistic                | GetYearlyMetadataByStation   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-estacio)                   | Metadades d'estadístics anuals d'una estació                  |
| XEMA | Statistic                | GetYearlyMetadataByFilters   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-variable-duna-estacio)     | Metadades d'estadístics anuals d'una variable d'una estació   |
| XEMA | Statistic                | GetMonthlyMetadataByStation  | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-duna-estacio)                 | Metadades d'estadístics mensuals d'una estació                |
| XEMA | Statistic                | GetMonthlyMetadataByFilters  | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-duna-variable-duna-estacio)   | Metadades d'estadístics mensuals d'una variable d'una estació |
| XEMA | Statistic                | GetDailyMetadataByStation    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-duna-estacio)                   | Metadades d'estadístics diaris d'una estació                  |
| XEMA | Statistic                | GetDailyMetadataByFilters    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-duna-variable-duna-estacio)     | Metadades d'estadístics diaris d'una variable d'una estació   |
| XEMA | MultivariableCalculation | GetByFilters                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#calcul-multivariable-duna-variable-a-una-estacio)           | Càlcul multivariable d'una variable a una estació             |
| XEMA | MultivariableCalculation | GetMetadataByStation         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-de-les-variables-duna-estacio)                    | Metadades de les variables d'una estació                      |
| XEMA | MultivariableCalculation | GetMetadataByFilters         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-duna-variable-duna-estacio)                       | Metadades d'una variable d'una estació                        |
| XEMA | MultivariableCalculation | All                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-de-totes-les-variables)                           | Metadades de totes les variables                              |
| XEMA | MultivariableCalculation | GetByVariable                | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-duna-variable)                                    | Metadades d'una variable                                      |
| XEMA | Auxiliary                | GetByFilters                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#calcul-auxiliars-duna-variable-a-una-estacio)                    | Càlcul auxiliars d'una variable a una estació                 |
| XEMA | Auxiliary                | GetMetadataByStation         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-les-variables-duna-estacio)                         | Metadades de les variables d'una estació                      |
| XEMA | Auxiliary                | GetMetadataByFilters         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable-duna-estacio)                            | Metadades d'una variable d'una estació                        |
| XEMA | Auxiliary                | All                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-totes-les-variables)                                | Metadades de totes les variables                              |
| XEMA | Auxiliary                | GetByVariable                | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable)                                         | Metadades d'una variable                                      |
