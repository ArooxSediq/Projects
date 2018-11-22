
package edu.auis.ite409.lab1;


public class Network {
     private Computer[] Computers;
    private IPAddress[] IPs;
    private String company;
    private Computer gateway;
    private String IPBluePrint;
    
    public Network(String company)                                        //Constructor #1
    {
        
        this.Computers = new Computer[100];
        this.IPs = new IPAddress[100];
        this.company=company;
        
    }//Constructor #1
    
    public Network(String company,int ComputersNo)                        //Constructor #2
    {
        
        this.Computers = new Computer[ComputersNo];
        this.IPs = new IPAddress[ComputersNo];
        this.company=company;
        
    }// Constructor #2
    
    public Network(String company, int ComputersNo, Computer gateway)    //Constructor #3
    {    
        
        this.Computers = new Computer[ComputersNo];
        this.IPs = new IPAddress[ComputersNo];
        this.company=company;
        this.gateway=gateway;
        
        this.IPs[0]=gateway.getIP();
        this.Computers[0]=gateway;
        
    }// Constructor #3
    
    private IPAddress generate()
    {
        //This method will generate a new octet 
        //Then it will add the octet to the end of the generated BluePrint

        if(BluePrint())                                //Checks if the IPBluePrint is not null
        {
            int lastOctet=0;                        //This last Octet of the IP that will be generated
            
            for(int i=0;i<IPs.length;i++)            //Checks for the last IP in the network
            {
                if(IPs[i]==null) 
                {
                    lastOctet=i+1;                    //Saves the index of that Octet and increments it
                    break;
                }        
            }
            
            if(lastOctet<255)                        //limiting the method to not generate more than 255
            {
                IPAddress newIP = new IPAddress(IPBluePrint+ lastOctet);
                return newIP;
            }
            else 
            {                                        
                System.out.println("Error: This Network is full");
                return null;
            }
            
        }
        else
        {                                            
            System.out.println("Error: Something went wrong, gateway is most likely unavailable");
            return null;
        }        
         
    }// generate()
    
    private boolean BluePrint()
    {
        //This method will generate the IPBluePrint according to the gateway
        //If the gateway wasn't set, the method will automatically set the gateway as 192.168.1.1
        //This IPblueprint will be used to generate IP address for the rest of the devices.
        //This method will almost always return true unless of a compiling error or an unknown bug
        
        if(this.IPBluePrint==null)
        {
            if(this.gateway!=null)
            {
                String GatewayIP=gateway.getIP().getIp();
                String bluePrint="";
                for(int i=0;i<=GatewayIP.lastIndexOf('.');i++)
                {
                    bluePrint+=GatewayIP.charAt(i);
                }
                this.IPBluePrint=bluePrint;
            }
            else    // if the gateway wasn't set
            {
                System.out.println("Warning: this network does not have a GateWay\nBy Default the system will choose (192.168.1.1)");
                Computer newGateway= new Computer("GateWay Computer",this.company);
                IPAddress newGatewayIP= new IPAddress("192.168.1.1");
                newGateway.setIP(newGatewayIP);
                //newGateway.setGateway(newGateway);  //in case of a system error
                
                this.setGateway(newGateway);
                
                String GatewayIP=gateway.getIP().getIp();
                String bluePrint="";
                for(int i=0;i<=GatewayIP.lastIndexOf('.');i++)
                {
                    bluePrint+=GatewayIP.charAt(i);
                }    
                this.IPBluePrint=bluePrint;
            }
            
            if(this.IPBluePrint==null) return false;
            else return true;
            
        }
        else return true;
    
    }// BluePrint()
    
    public void setGateway(Computer gateway)
    {
        this.gateway=gateway;                    //Setting the gateway of the network
        this.IPs[0]=gateway.getIP();            //Inserting the gateway IP into the array
        this.Computers[0]=gateway;                //inserting the gateway object into the array
    }// setGateway(Computer gateway)
    
    public Computer getGateway()
    {
        return this.Computers[0];                //Computers[0] is by default the gateway
                                                //this line could be changed into
                                                // return this.gateway;
    }// getGateway()
    
    public String getCompany()
    {
        return this.company;
    }// getCompany
    
    public void connect(Computer newPC)
    {
        int Index=0;
        
        for(int i=0;i<this.Computers.length;i++)    
        {
            if(this.Computers[i]==null)              //Finding an empty index in the array
            {
                Index=i;                            //Saving the index 
                break;
            }
        }
        
        IPAddress newIP = generate();                //Generating a new IP for the device 
        newIP.setComputer(newPC);                    //Declaring the IP's Device
        newIP.setDHCP(true);                        //Setting DHCP as true
        
        newPC.setIP(newIP);                            //Setting the generated IP on the device
        newPC.setGateway(this.gateway);                //Setting the gateway on the device

        
        this.Computers[Index]=newPC;                //Adding the new device to the network
        this.IPs[Index]=newPC.getIP();
        
    }// connect(Computer newPC)
    
    public void disConnect(Computer a)
    {
        for(int i=0;i<this.Computers.length;i++)    //Finding a matching object in the array
        {
            if(this.Computers[i]==a)
            {
                this.IPs[i]=null;                    //Deleting the object from both arrays
                this.Computers[i]=null;
            }
        }
        System.out.println(a.getHostName()+" Has been Disconnected from "+this.gateway.getCompany());    
        
    }// disConnect(Computer a);
    
    public void printConnectedDevices()
    {
        //This method will print all connected computers
        
        System.out.printf("\nThe Connected Computers on This Network are\n..............................................\n");
        for(int i=0 ;i<this.Computers.length;i++)
        {
            if(this.Computers[i]!=null)
            {
                
                System.out.printf("\nComputer %s\n{\n ",this.Computers[i].getHostName());
                System.out.println( "    IP Address: "+this.Computers[i].getIP().getIp() );
                System.out.println( "     IP GateWay: "+this.gateway.getIP().getIp()    );
                System.out.printf("} \n");
            }
        }
        
    }// printConnectedDevices();
}
