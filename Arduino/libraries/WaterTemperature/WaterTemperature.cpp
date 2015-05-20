#include "Arduino.h"
#include "OneWire.h"
#include "DallasTemperature.h"
#include "WaterTemperature.h"

WaterTemperature::WaterTemperature(int pin)
{
  oneWire = new OneWire(pin);
  sensor = new DallasTemperature(oneWire);
  sensor->begin();
}

WaterTemperature::~WaterTemperature()
{
  delete sensor;
  delete oneWire;
}

float WaterTemperature::readWaterTemp()
{
  sensor->requestTemperatures();
  return sensor->getTempCByIndex(0);
}
