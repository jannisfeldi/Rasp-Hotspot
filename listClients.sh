while true
do
echo "$(sudo create_ap --list-clients wlan1)" > states/connectedDevices.state
sleep 30
done