import java.util.Scanner;
public class LinkListAPP {

	public static void main(String[] args)
	{	
		Scanner input= new Scanner(System.in);	LinkedListEmployee a = new LinkedListEmployee();
		
		System.out.print("Number of employees?: "); int EmployeeNum=input.nextInt();
		
		a.insertToFirst(new Employee());
		
		for(int i=0;i< EmployeeNum-1;i++)
		{
			a.insertLast(new Employee());
		}
		
		a.printALL();
		
//		System.out.println("init popbyFIFO");
//		a.popbyFIFO();
//		a.printALL();

	
		System.out.println("init Employee_Search");		System.out.print("Please enter the ID:	");
		Employee found = a.Employee_search(input.nextInt()); 
		if(found!=null)	System.out.printf("\nEmployee data\n\n ID: %d | Name: %s | Department: %d | Salary: %d $",found.id,found.name,found.department,found.salary);
		else System.out.println("Employee not found!");
	}		
	
}
