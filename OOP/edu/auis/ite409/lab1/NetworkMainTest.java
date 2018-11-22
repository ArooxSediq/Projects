
package edu.auis.ite409.lab1;


public class NetworkMainTest {

    public static void main(String...arg){
        
        //Creating the first network for ITSULY
        Network LAN1 = new Network("ITSuly",50);
        Computer LAN1_Gateway = new Computer("LAN1 Gateway","ITSuly");
    
        IPAddress Gateway_IP = new IPAddress("192.168.1.1");

        LAN1_Gateway.setIP(Gateway_IP);
        LAN1.setGateway(LAN1_Gateway);
        
        //Add 40 computers to LAN1 and Connecting them
        Computer[] Set1 = new Computer[40];
            for(int i=0;i<Set1.length;i++)
            {
                Set1[i]= new Computer("PC"+i+"-ITSULY-SET1" , "ITSuly");
                LAN1.connect(Set1[i]);
            }
            
            
        //------------
            
        //Creating the first network for ITSULY
        Network LAN2 = new Network("ITSuly",100);
        Computer LAN2_Gateway = new Computer("LAN2 Gateway","ITSuly");
        
        Gateway_IP = new IPAddress("10.10.1.1");
    
        LAN2_Gateway.setIP(Gateway_IP);
        LAN2.setGateway(LAN2_Gateway);
            
        //Add 40 computers to LAN1 and Connecting them
        Computer[] Set2 = new Computer[94];
            for(int i=0;i<Set2.length;i++)
            {
                Set2[i]= new Computer("PC"+i+"-ITSULY-SET2" , "ITSuly");
                LAN2.connect(Set2[i]);
            }
        
        //-----------
            
        printDetails(LAN1);    
        printDetails(LAN2);
        
        //Deleting 10 Computers from LAN1
        for(int i=0;i<10;i++) LAN1.disConnect(Set1[i]);
        
        //Deleting 20 Computers from LAN2
        for(int i=0;i<20;i++) LAN2.disConnect(Set2[i]);
        
        printDetails(LAN1);
        printDetails(LAN2);
        
    }// main(String[] args)

    
    public static void printDetails(Network network)    
    {
        //This method will print the network company name, hostname, gateway ip
        //And will call another method in Network Class to print all the connected devices
        
        System.out.printf("\nThis Network's Details\n.......................\n");
        
        System.out.println(network.getCompany());
        System.out.println(network.getGateway().getHostName());
        System.out.println(network.getGateway().getIP().getIp());
        
        network.printConnectedDevices();

    }// printDetails
    
}
