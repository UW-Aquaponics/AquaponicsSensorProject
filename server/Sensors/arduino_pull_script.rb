require "serialport"

#params for serial port
port_str = "COM10"
baud_rate = 9600
data_bits = 8
stop_bits = 1
parity = SerialPort::NONE
file_str = "measurements.txt"

time = Time.new
port = SerialPort.new(port_str, baud_rate, data_bits, stop_bits, parity)

#just read forever
while true do
   while (i = port.gets) do
     puts "test"
     IO.write(file_str,"34, 23, 53, 34, 35, "+i.chomp.gsub("p",", ")+"34, 57.95, "+Time.now.inspect.gsub(/ -\d\d\d\d/,""))
   end
end

port.close