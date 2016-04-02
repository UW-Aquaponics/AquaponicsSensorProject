#include "Arduino.h"
#include "DHT.h"
#include "AirTemperatureAndHumidity.h"

AirTemperatureAndHumidity::AirTemperatureAndHumidity(int pin, int type)
{
  sensor = new DHT(pin, type);
  sensor -> begin();
}

AirTemperatureAndHumidity::~AirTemperatureAndHumidity()
{
  delete sensor;
}

float AirTemperatureAndHumidity::readHumidity()
{
  return sensor->readHumidity();
}

float AirTemperatureAndHumidity::readAirTemp()
{
  return sensor->readTemperature();
};
