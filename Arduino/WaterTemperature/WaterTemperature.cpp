#include "Arduino.h"
#include "OneWire.h"
#include "DallasTemperature.h"
#include "WaterTemperature.h"

WaterTemperature::WaterTemperature()
{
  oneWire = new OneWire(ONE_WIRE_BUS);
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
