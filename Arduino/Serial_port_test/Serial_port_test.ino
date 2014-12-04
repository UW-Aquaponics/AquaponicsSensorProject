


void setup() {
 //Initialize serial and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for Leonardo only
  }
  Serial.write("I exist");
}

void loop() {
 Serial.write("I exist");
 delay(10000);
}

