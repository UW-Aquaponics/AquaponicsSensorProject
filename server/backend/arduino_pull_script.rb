require "serialport"

#params for serial port
port_str = "/dev/ttyACM0"
baud_rate = 9600
data_bits = 8
stop_bits = 1
parity = SerialPort::NONE
file_str = "temp_data"

time = Time.new
port = SerialPort.new(port_str, baud_rate, data_bits, stop_bits, parity)

#just read forever
while true do
   while (i = port.gets) do
     IO.write(file_str,i+Time.now.inspect.gsub(/ -\d\d\d\d/,""))
   end
end

port.close
