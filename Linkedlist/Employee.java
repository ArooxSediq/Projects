import java.util.Scanner;

public class Employee 
{
	Scanner input = new Scanner(System.in);
	public int id;
	public String name;
	public int department;
	public int salary;
	
	public Employee()
	{
		System.out.printf("\nPlease enter the data for a new employee\n");
		
		System.out.print("ID: ");
			id=input.nextInt();
		
		System.out.print("Name: ");
			name=input.next();
		
		System.out.print("Department: ");
			department=input.nextInt();
		
		System.out.print("Salary: ");
			salary=input.nextInt();
			
		System.out.println();	
		
	}//Constructor

}//Class Employee


class Link 
{
		public Employee data;
		public Link next;
		public Link previous;
		
}//Class Link


class LinkedListEmployee
{
	private Link first;
		
		public LinkedListEmployee() { first=null; } //Constructor
		
		public void insertToFirst(Employee value)
		{
			Link newLink = new Link();
			newLink.data = value;
			
			newLink.next = first;
			
			if(first != null)
			{
				first.previous = newLink;
			}
			
			first = newLink;
		}//insertToFirst
		
		public void insertLast(Employee value)
		{		
					Link temp=first;
					
					while(temp.next!=null)
					temp=temp.next;
					
					Link newLink = new Link();
					newLink.data=value;
					temp.next=newLink;
					newLink.previous=temp;
					
		}//InsertLast
		
		public void printALL()
		{
			System.out.printf("Your LinkList contains: \n\n");
			Link temp=first;
			
			while(temp!=null)
			{
			System.out.println(" ID= "+temp.data.id+" | "+" Name= "+temp.data.name+" | "+" Department= "+temp.data.department+" | "+" Salary= "+temp.data.salary+" | ");
			temp=temp.next;
			}
			System.out.println();
		}//PrintALL
		
		public int hashBySalary(Link e)
		{
			return e.data.salary;
		}//hashBySalary
		
		public void sortBySalary()					//SelectionSort method implementation 
		{	
			Link Counter=first;
			Link min=Counter;
			Counter= (Link) Counter.next;
			Link loop = first;
			
			while(loop.next!=null)
			{	
				while(Counter.next!=null)
				{	
					if( hashBySalary(Counter.next) < hashBySalary(Counter) )
					{
						if(hashBySalary(Counter.next) < hashBySalary(min))
						min=Counter.next;
					}
					Counter= (Link) Counter.next;
				}
				
				Employee temp = first.data;
				first.data = min.data;
				min.data = temp;
				
				loop = (Link) loop.next;
			}
			
			
		}//sortBySalary method
		
		public Employee Employee_search(int id)
		{
			Link Low = first;
			
			while(Low.next!=null)
			{
				if(id== Low.data.id)
				{
					return Low.data;
				}
				Low = (Link) Low.next;	
			}
			return null;
			
		}//Employee_Search
		
		
		
		public void popbyFIFO()
		{
			first.data=null;
			Link a=first.next;
			a.previous=null;
			first=a;
		}
		
		public void popbyLIFO()
		{
			Link last=first;
			while(last.next!=null) last = (Link) last.next;
			
			last.data=null;
			last=last.previous;
			last.next=null;
		}
		
		public Link searchByDept(int deptID)
		{
			Link Search = first;
			while(Search.next!=null)
			{
				if(Search.data.department==deptID)
				{
				return Search;	
				}
				Search=(Link) Search.next;
			}
			return null;
		}
		
		public void deleteByDept(int deptID)
		{
			Link delete = searchByDept(deptID);
			Link Next =delete.next;
			delete.data=null;
			
			delete=(Link) delete.previous;
			delete.next=Next;
			
			Next.previous=delete;
			
		}
		
		
		
}//Class LinkedListEmployee


