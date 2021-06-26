<details>
<summary>1. Fibbonoci Series</summary>
<p>
  
```
public static void main(String args[]){
    int input = 8;
    int[] arr = new int[input];
    arr[0]=0;arr[1]=1;

    for(int i=2;i<input;i++){
       arr[i]=arr[i-2]+arr[i-1];
    }
   System.out.println(Arrays.toString(arr));
}
```
</p>
</details>  

<details>
<summary>2. Find prime number or not</summary>
<p>
  
```
public static void main(String args[]){
 int input = 13;
  boolean flag=true;
  if(input==0||input==1){ 
   flag=false;
  } else {
    for(int i=2;i<=input/2;i++){
      if(input%i==0) { 
        flag=false; break;
      }
    }
  }
  if(flag) System.out.println("It is prime");
  else System.out.println("It is not prime");
```
</p>
</details>  

