float data [1];
char names [1]= {'p'};
float ph;

void setup(){
  Serial.begin(9600);
  Serial.end();
}

float get_ph(int number, float temp){
  float ph_val = 7 - (2.5 - analogRead(number)/200.0) / (0.257179 + 0.000941468 * temp);
  float adjusted_ph = -61.6111+69.4444* sqrt(0.0288*ph_val+0.788691);
  return adjusted_ph;
  //return analogRead(number);
  //return 0.0178*analogRead(number)*0.9-1.889;
}

void send_data(float dataForSend[], char sensorNames[],int size) 
{
  String sendString = "";
  for(int i=0;i < size;i++){
   sendString = sendString + dataForSend[i] +sensorNames[i] +"\n";
  }
  Serial.print(sendString);
  
  //format of the string to be sent is a character to identify each sensor, followed by
  // the data in the form of the isnteger, followed by a new line character
   
}

void loop(){
  ph = get_ph(0,20);
  data[0] = ph;
  send_data(data, names,1);
  //Serial.print(ph);
  delay(4000);
}


