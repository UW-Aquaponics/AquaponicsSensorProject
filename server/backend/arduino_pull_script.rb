require "/home/ikkalyzte/.rvm/gems/ruby-2.1.3/gems/serialport-1.3.1"

#params for serial port
port_str = "ttyACM0"
baud_rate = 9600
data_bits = 8
stop_bits = 1
parity = SerialPort::NONE
file_str = "temp_data"

time = Time.new
#file = IO.open(file_str,w)
port = SerialPort.new(port_str, baud_rate, data_bits, stop_bits, parity)

#just read forever
#while true do
#   while (i = port.gets) do
#     file.puts(i)
#     file.puts(time.inspect)
#   end
#end
while true do
  while (i=port.gets) do
    puts(i)
  end
end

port.close