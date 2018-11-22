package edu.auis.ite409.lab1;

public class IPAddress {

    private final String ip;
    private boolean isDHCP;
    private Computer computer;
    
    IPAddress(String a)
    {
        
        this.ip=a;
        
    }//Constructor
    
    public String getIp()
    {
        return this.ip;
    }
    
    public boolean isDHCP()
    {
        return isDHCP;
    }
    
    public void setDHCP(boolean a)
    {
        this.isDHCP=a;
    }
    
    public Computer getComputer()
    {
        return this.computer;
    }
    
    void setComputer(Computer a)
    {
        this.computer=a;
    }

}// Class IPaddress

