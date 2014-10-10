require "serialport"

#params for serial port
port_str = SOME_PORT_NAME
baud_rate = 9600
data_bits = 8
stop_bits = 1
parity = SerialPort::NONE
file_str = SOME_FILE_NAME

time = Time.new
file = IO.open(file_str,w)
port = SerialPort.new(port_str, baud_rate, data_bits, stop_bits, parity)

#just read forever
while true do
   while (i = port.gets) do
     file.puts(i)
     file.puts(time.inspect)
   end
end

port.close