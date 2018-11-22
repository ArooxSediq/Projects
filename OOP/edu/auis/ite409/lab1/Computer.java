package edu.auis.ite409.lab1;

public class Computer {

    private String hostname;
    private String company;
    private IPAddress ip;
    private Computer gateway;
    
    Computer(String hostname,String company)
    {
        
        this.hostname=hostname;
        this.company=company;
        
    }// Constructor
    
    public String getHostName()
    {
        return this.hostname;
    }
    
    public void setHostName(String a)
    {
        this.hostname=a;
    }
    
    public String getCompany()
    {
        return this.company;
    }
    
    public void setCompany(String a)
    {
        this.company=a;
    }
    
    public IPAddress getIP()
    {
        return this.ip;
    }
    
    void setIP(IPAddress a)
    {
        this.ip=a;
    }
    
    public Computer getGateway()
    {
        return this.gateway;
    }
    
    void setGateway(Computer a)
    {
        this.gateway=a;
    }


}// Class Computer
