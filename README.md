# [Meteo.cat](https://www.meteo.cat) API Client
An **unofficial** PHP client for easy use of the [Meteo.cat API REST](https://apidocs.meteocat.gencat.cat/).

Documentation of the API can be found at [https://apidocs.meteocat.gencat.cat/documentacio/](https://apidocs.meteocat.gencat.cat/documentacio/).

As the documentation indicates, to use this provider it is necessary to request the _access token_ from this [form](https://apidocs.meteocat.gencat.cat/documentacio/acces-ciutada-i-administracio/). 

## About the provider
- [_Servei Meteorològic de Catalunya_](http://www.meteo.cat/).
- [Wikipedia](https://en.wikipedia.org/wiki/Meteorological_Service_of_Catalonia). 

## Installation
Use [Composer](https://getcomposer.org/):

```bash
$ composer require mariusasensi/meteocat-api-php-client
```

## Usage
```php
use Meteocat\Provider\Meteocat;
use Meteocat\Model\Query\Forecast\Forecasting\GetCatalunyaByDate;
use Meteocat\Model\Entity\Forecast;

$client = new Meteocat('your_api_token');
$query = new GetCatalunyaByDate(DateTime::createFromFormat('Y-m-d', '2019-08-06'));

/** @var Forecast $entityResponse */
$response = $client->executeQuery($query);
```

## Operation query types
| Type      | Subtype                  | Query class name                | Documentation                                                                                                                             | Description (CA)                                               |
|-----------|--------------------------|---------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------|----------------------------------------------------------------|
| XEMA      | Representative           | GetStationByCity                | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#estacions-representatives-per-a-un-municipi-i-una-variable)      | Estacions representatives per a un municipi i una variable     |
| XEMA      | Representative           | GetAllVariableMetadata          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/representatives/#metadades-de-variables)                                          | Metadades de variables                                         |
| XEMA      | Stations                 | GetAll                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-de-totes-les-estacions)                            | Metadades de totes les estacions                               |
| XEMA      | Stations                 | GetUnique                       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/metadades-estacions/#metadades-duna-estacio)                                      | Metadades d'una estació                                        |
| XEMA      | Measurement              | GetByDay                        | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#dades-duna-variable-per-a-totes-les-estacions)                   | Dades d'una variable per a totes les estacions                 |
| XEMA      | Measurement              | GetLast                         | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#ultimes-dades-duna-variable-per-a-totes-les-estacions)           | Últimes dades d'una variable per a totes les estacions         |
| XEMA      | Measurement              | GetAllByStation                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-les-variables-duna-estacio)                         | Metadades de les variables d'una estació                       |
| XEMA      | Measurement              | GetByStation                    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable-duna-estacio)                            | Metadades d'una variable d'una estació                         |
| XEMA      | Measurement              | GetAll                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-de-totes-les-variables)                                | Metadades de totes les variables                               |
| XEMA      | Measurement              | GetUnique                       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-mesurades/#metadades-duna-variable)                                         | Metadades d'una variable                                       |
| XEMA      | Statistic                | GetYearlyByVariable             | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-anuals-duna-variable-per-a-totes-les-estacions)   | Estadístics anuals d'una variable per a totes les estacions    |
| XEMA      | Statistic                | GetMonthlyByVariable            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-mensuals-duna-variable-per-a-totes-les-estacions) | Estadístics mensuals d'una variable per a totes les estacions  |
| XEMA      | Statistic                | GetDailyByVariable              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#estadistics-diaris-duna-variable-per-a-totes-les-estacions)   | Estadístics diaris d'una variable per a totes les estacions    |
| XEMA      | Statistic                | GetYearlyMetadata               | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals)                                | Metadades d'estadístics anuals                                 |
| XEMA      | Statistic                | GetYearlyMetadataByVariable     | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-per-variable)                   | Metadades d'estadístics anuals per variable                    |
| XEMA      | Statistic                | GetMonthlyMetadata              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals)                              | Metadades d'estadístics mensuals                               |
| XEMA      | Statistic                | GetMonthlyMetadataByVariable    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-per-variable)                 | Metadades d'estadístics mensuals per variable                  |
| XEMA      | Statistic                | GetDailyMetadata                | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris)                                | Metadades d'estadístics diaris                                 |
| XEMA      | Statistic                | GetDailyMetadataByVariable      | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-per-variable)                   | Metadades d'estadístics diaris per variable                    |
| XEMA      | Statistic                | GetYearlyMetadataByStation      | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-estacio)                   | Metadades d'estadístics anuals d'una estació                   |
| XEMA      | Statistic                | GetYearlyMetadataByFilters      | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-anuals-duna-variable-duna-estacio)     | Metadades d'estadístics anuals d'una variable d'una estació    |
| XEMA      | Statistic                | GetMonthlyMetadataByStation     | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-duna-estacio)                 | Metadades d'estadístics mensuals d'una estació                 |
| XEMA      | Statistic                | GetMonthlyMetadataByFilters     | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-duna-variable-duna-estacio)   | Metadades d'estadístics mensuals d'una variable d'una estació  |
| XEMA      | Statistic                | GetDailyMetadataByStation       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-duna-estacio)                   | Metadades d'estadístics diaris d'una estació                   |
| XEMA      | Statistic                | GetDailyMetadataByFilters       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-diaris-duna-variable-duna-estacio)     | Metadades d'estadístics diaris d'una variable d'una estació    |
| XEMA      | MultivariableCalculation | GetByFilters                    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#calcul-multivariable-duna-variable-a-una-estacio)           | Càlcul multivariable d'una variable a una estació              |
| XEMA      | MultivariableCalculation | GetMetadataByStation            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-de-les-variables-duna-estacio)                    | Metadades de les variables d'una estació                       |
| XEMA      | MultivariableCalculation | GetMetadataByFilters            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-duna-variable-duna-estacio)                       | Metadades d'una variable d'una estació                         |
| XEMA      | MultivariableCalculation | GetAll                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-de-totes-les-variables)                           | Metadades de totes les variables                               |
| XEMA      | MultivariableCalculation | GetByVariable                   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-duna-variable)                                    | Metadades d'una variable                                       |
| XEMA      | Auxiliary                | GetByFilters                    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#calcul-auxiliars-duna-variable-a-una-estacio)                    | Càlcul auxiliars d'una variable a una estació                  |
| XEMA      | Auxiliary                | GetMetadataByStation            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-les-variables-duna-estacio)                         | Metadades de les variables d'una estació                       |
| XEMA      | Auxiliary                | GetMetadataByFilters            | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable-duna-estacio)                            | Metadades d'una variable d'una estació                         |
| XEMA      | Auxiliary                | GetAll                          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-de-totes-les-variables)                                | Metadades de totes les variables                               |
| XEMA      | Auxiliary                | GetByVariable                   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/dades-auxiliars/#metadades-duna-variable)                                         | Metadades d'una variable                                       |
| XDDE      | Lightning                | GetOfCatalunyaByDateTime        | [Link](https://apidocs.meteocat.gencat.cat/documentacio/xarxa-de-deteccio-de-descarregues-electriques/#dades-de-descarregues-a-catalunya) | Dades de descàrregues a Catalunya                              |
| XDDE      | Lightning                | GetOfCountyByDate               | [Link](https://apidocs.meteocat.gencat.cat/documentacio/xarxa-de-deteccio-de-descarregues-electriques/#resum-de-descarregues-per-comarca) | Resum de descàrregues per comarca                              |
| Forecast  | Forecasting              | GetCatalunyaByDate              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-general-de-catalunya)                                        | Predicció general de Catalunya                                 |
| Forecast  | Forecasting              | GetCountyByDate                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-comarcal-de-catalunya)                                       | Predicció comarcal de Catalunya                                |
| Forecast  | Forecasting              | GetByCity                       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-municipal)                                                   | Predicció municipal                                            |
| Forecast  | Forecasting              | GetCurrentWarnings              | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#situacions-meteorologiques-de-perill-llista-depisodis-oberts)          | Situacions Meteorològiques de Perill: Llista d'Episodis Oberts |
| Forecast  | Forecasting              | GetCurrentAlerts                | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#situacions-meteorologiques-de-perill-preavisos)                        | Situacions Meteorològiques de Perill: Preavisos                |
| Forecast  | Forecasting              | GetPyreneesMountainPeakMetadata | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#metadades-de-pics-del-pirineu)                                         | Metadades de pics del Pirineu                                  |
| Forecast  | Forecasting              | GetPyreneesMountainHuntMetadata | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#metadades-de-refugis-del-pirineu)                                      | Metadades de refugis del Pirineu                               |
| Forecast  | Forecasting              | GetPyreneesMountainPeakByDate   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-pics-del-pirineu)                                         | Predicció de pics del Pirineu                                  |
| Forecast  | Forecasting              | GetPyreneesMountainHuntByDate   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-pics-del-pirineu)                                         | Predicció de refugis del Pirineu                               |
| Forecast  | Forecasting              | GetPyreneesZonesByDate          | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-de-zones-del-pirineu)                                        | Predicció de zones del Pirineu                                 |
| Forecast  | Forecasting              | GetUltravioletIndexByCity       | [Link](https://apidocs.meteocat.gencat.cat/documentacio/prediccio/#prediccio-index-ultraviolat-uvi)                                       | Predicció Índex ultraviolat (UVI)                              |
| Quota     | Information              | GetCurrentUsage                 | [Link](https://apidocs.meteocat.gencat.cat/documentacio/quotes/#consum-actual)                                                            | Consum actual                                                  |
| Reference | Data                     | GetAllCounties                  | [Link](https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-de-les-comarques)                                 | Dades de referència de les comarques                           |
| Reference | Data                     | GetAllSymbols                   | [Link](https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-dels-simbols-meteorologics)                       | Dades de referència dels símbols meteorològics                 |
| Reference | Data                     | GetAllCities                    | [Link](https://apidocs.meteocat.gencat.cat/documentacio/referencia/#dades-de-referencia-dels-municipis)                                   | Dades de referència dels municipis                             |

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
