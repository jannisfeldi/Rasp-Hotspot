while true
do
echo "$(sudo create_ap --list-clients wlan1 | awk 'NR>1{print $NF}')" > states/connectedDevices.state
sleep 15
done