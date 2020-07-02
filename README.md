[![Build Status](https://api.travis-ci.org/RentadroneCL/ui.svg)](https://travis-ci.org/github/RentadroneCL/ui)
[![License](https://poser.pugx.org/composer/spdx-licenses/license)](https://packagist.org/packages/composer/spdx-licenses)
[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-v2.0%20adopted-ff69b4.svg)](CODE_OF_CONDUCT.md)

[Rentadrone.cl](https://rentadronecl.github.io)

# UI

A beautifully designed administration tool for your organization projects, with an intuitive control panel, which gives you easy access to the EXIF meta-data of an image, generate KMZ and more. Carefully crafted by the team of [Rentadrone.cl](https://rentadrone.cl).

See the [documentation](https://rentadronecl.github.io/docs/detection-models) for tutorials and more guides.

## Developers
Help improve our software! We welcome contributions from everyone, whether to add new features, improve speed, fix existing bugs or add support. [Check our code of conduct](CODE_OF_CONDUCT.md), [the contributing guidelines](CONTRIBUTING.md) and how decisions are made.

Any code contributions are welcomed as long as they are discussed in [Github Issues](https://github.com/RentadroneCL/ui/issues) with maintainers. Be aware that if you decide to change something and submit a PR on your own, it may not be accepted.

#### Creating an issue
You can open a new issue based on code from an existing pull request. For more information, see [the template for filling issues](https://github.com/RentadroneCL/ui/blob/master/.github/ISSUE_TEMPLATE/feature_request.md)

# Requirements

[Exiftool](https://exiftool.org) adapter (wrapper for the exiftool binary)

Installation of the exiftool binary on debian based system

`sudo apt install libimage-exiftool-perl`

## Example of the utility

The geodata underlying the map are generate with [OpenStreetMap (OSM)](https://www.openstreetmap.org/)

![Home](/resources/vendor/12-50-11.png)
![Images](/resources/vendor/12-51-29.png)
![Upload](/resources/vendor/12-51-39.png)
![Map](/resources/vendor/13-17-31.png)
![Exif](/resources/vendor/13-17-45.png)

## Example of an output data

```js
{
  "SourceFile": "/tmp/phpUKu1AA",
  "ExifTool:ExifToolVersion": 10.8,
  "System:FileName": "phpUKu1AA",
  "System:Directory": "/tmp",
  "System:FileSize": 822090,
  "System:FileModifyDate": "2020:06:03 16:51:37+00:00",
  "System:FileAccessDate": "2020:06:03 16:51:38+00:00",
  "System:FileInodeChangeDate": "2020:06:03 16:51:37+00:00",
  "System:FilePermissions": 600,
  "File:FileType": "JPEG",
  "File:FileTypeExtension": "JPG",
  "File:MIMEType": "image/jpeg",
  "File:ExifByteOrder": "II",
  "File:ImageWidth": 640,
  "File:ImageHeight": 512,
  "File:EncodingProcess": 0,
  "File:BitsPerSample": 8,
  "File:ColorComponents": 3,
  "File:YCbCrSubSampling": "2 2",
  "JFIF:JFIFVersion": "1 1",
  "JFIF:ResolutionUnit": 0,
  "JFIF:XResolution": 1,
  "JFIF:YResolution": 1,
  "IFD0:Make": "DJI",
  "IFD0:Model": "FLIR",
  "IFD0:XResolution": 1,
  "IFD0:YResolution": 1,
  "IFD0:ResolutionUnit": 1,
  "IFD0:Software": "01.15.00.62",
  "IFD0:ModifyDate": "2019:03:28 17:05:49",
  "ExifIFD:FNumber": 1.25,
  "ExifIFD:DateTimeOriginal": "2019:03:28 17:05:49",
  "ExifIFD:ApertureValue": 1.54221082540794,
  "ExifIFD:FocalLength": 13,
  "ExifIFD:SubSecTimeOriginal": 301,
  "ExifIFD:FocalPlaneResolutionUnit": 4,
  "GPS:GPSLatitudeRef": "S",
  "GPS:GPSLatitude": 27.1128060277778,
  "GPS:GPSLongitudeRef": "W",
  "GPS:GPSLongitude": 70.1780021666667,
  "GPS:GPSAltitudeRef": 0,
  "GPS:GPSAltitude": 1175.4,
  "GPS:GPSMapDatum": "WGS-84",
  "IFD1:Compression": 6,
  "IFD1:XResolution": 1,
  "IFD1:YResolution": 1,
  "IFD1:ResolutionUnit": 1,
  "IFD1:ThumbnailOffset": 576,
  "IFD1:ThumbnailLength": 14705,
  "IFD1:ThumbnailImage": "(Binary data 14705 bytes, use -b option to extract)",
  "XMP-rdf:About": "DJI Meta Data",
  "XMP-drone-dji:AbsoluteAltitude": 1175.492432,
  "XMP-drone-dji:RelativeAltitude": 41.400002,
  "XMP-drone-dji:GimbalRollDegree": 0,
  "XMP-drone-dji:GimbalYawDegree": 89.199997,
  "XMP-drone-dji:GimbalPitchDegree": -45.599998,
  "XMP-drone-dji:FlightRollDegree": 9.2,
  "XMP-drone-dji:FlightYawDegree": 73.400002,
  "XMP-drone-dji:FlightPitchDegree": -2.7,
  "XMP-FLIR:CentralTemperature": 45,
  "XMP-FLIR:TlinearGain": 0,
  "XMP-FLIR:BandName": "LWIR",
  "XMP-FLIR:CentralWavelength": 10000,
  "XMP-FLIR:WavelengthFWHM": 4500,
  "FLIR:CreatorSoftware": "ATAU_RBFO",
  "FLIR:RawThermalImageWidth": 640,
  "FLIR:RawThermalImageHeight": 512,
  "FLIR:RawThermalImageType": "TIFF",
  "FLIR:RawThermalImage": "(Binary data 655564 bytes, use -b option to extract)",
  "FLIR:Emissivity": 1,
  "FLIR:ObjectDistance": 20,
  "FLIR:ReflectedApparentTemperature": 21.9999938964844,
  "FLIR:AtmosphericTemperature": 21.9999938964844,
  "FLIR:IRWindowTemperature": 21.9999938964844,
  "FLIR:IRWindowTransmission": 1,
  "FLIR:RelativeHumidity": 0.5,
  "FLIR:PlanckR1": 17096.453125,
  "FLIR:PlanckB": 1428,
  "FLIR:PlanckF": 1,
  "FLIR:AtmosphericTransAlpha1": "0.00656899996101856",
  "FLIR:AtmosphericTransAlpha2": 0.0126200001686811,
  "FLIR:AtmosphericTransBeta1": "-0.00227600010111928",
  "FLIR:AtmosphericTransBeta2": "-0.00667000003159046",
  "FLIR:AtmosphericTransX": 1.89999997615814,
  "FLIR:CameraTemperatureRangeMax": 134.999993896484,
  "FLIR:CameraTemperatureRangeMin": -25.0000061035156,
  "FLIR:CameraTemperatureMaxClip": 149.999993896484,
  "FLIR:CameraTemperatureMinClip": -60.0000061035156,
  "FLIR:CameraTemperatureMaxWarn": 134.999993896484,
  "FLIR:CameraTemperatureMinWarn": -25.0000061035156,
  "FLIR:CameraTemperatureMaxSaturated": 149.999993896484,
  "FLIR:CameraTemperatureMinSaturated": -60.0000061035156,
  "FLIR:CameraModel": "",
  "FLIR:CameraPartNumber": "",
  "FLIR:CameraSerialNumber": "",
  "FLIR:CameraSoftware": "",
  "FLIR:LensModel": "",
  "FLIR:LensPartNumber": "",
  "FLIR:LensSerialNumber": "",
  "FLIR:FieldOfView": 0,
  "FLIR:FilterModel": "",
  "FLIR:FilterPartNumber": "",
  "FLIR:FilterSerialNumber": "",
  "FLIR:PlanckO": 57,
  "FLIR:PlanckR2": 0.0434707924723625,
  "FLIR:RawValueMedian": 4027,
  "FLIR:RawValueRange": 1724,
  "FLIR:DateTimeOriginal": "2019:03:28 17:05:49.298+00:00",
  "FLIR:FocusStepCount": 0,
  "FLIR:FocusDistance": 0,
  "FLIR:FrameRate": 0,
  "FLIR:PeakSpectralSensitivity": 10.0753862044818,
  "Composite:Aperture": 1.25,
  "Composite:GPSAltitude": 1175.4,
  "Composite:GPSLatitude": -27.1128060277778,
  "Composite:GPSLongitude": -70.1780021666667,
  "Composite:GPSPosition": "-27.1128060277778 -70.1780021666667",
  "Composite:ImageSize": "640x512",
  "Composite:Megapixels": 0.32768,
  "Composite:SubSecDateTimeOriginal": "2019:03:28 17:05:49.301",
  "Composite:FocalLength35efl": 13
}
```

# Contributing

Contributions are **welcome** and will be fully **credited**. We accept contributions via Pull Requests on [GitHub](https://github.com/RentadroneCL/ui).

## Contribution guidelines

**If you want to contribute to Rentadrone.cl, be sure to review the
[contribution guidelines](CONTRIBUTING.md). This project adheres to Contributor Covenant's
[code of conduct](CODE_OF_CONDUCT.md). By participating, you are expected to
uphold this code.**

**We use [GitHub issues](https://github.com/RentadroneCL/ui/issues) for
tracking requests and bugs, please see

for general questions and discussion, and please direct specific questions to the team of
[Rentadrone.cl](mailto:contacto@rentadrone.cl).**

## Pull Requests

- **[PSR-12 Coding Standard.](https://www.php-fig.org/psr/psr-12)** The easiest way to apply the conventions is to install [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer).
- **Add tests!** Your patch won't be accepted if it doesn't have tests.
- **Document any change in behaviour.** Make sure the `README.md` and any other relevant documentation are kept up-to-date.
- **Consider our release cycle.** We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.
- **Create feature branches.** Don't ask us to pull from your master branch.
- **One pull request per feature.** If you want to do more than one thing, send multiple pull requests.
- **Send coherent history.** Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commdroneraisingit-Messages) before submitting.

*Happy coding!*

## Security Vulnerabilities

If you discover a security vulnerability within, please send an e-mail via [contacto@rentadrone.cl](mailto:contacto@rentadrone.cl). All security vulnerabilities will be promptly addressed.

## [Code of Conduct](https://github.com/RentadroneCL/droneraising/blob/master/CODE_OF_CONDUCT.md)

The code of conduct is derived from the [Contributor Covenant](https://www.contributor-covenant.org). Any violations of the code of conduct may be reported to [Rentadrone.cl](mailto:contacto@rentadrone.cl)

## License

open-source software licensed under the [MIT license.](LICENSE)
