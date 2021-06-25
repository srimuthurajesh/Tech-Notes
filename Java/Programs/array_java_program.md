<details>
<summary>1. Find secound, third larges number from array</summary>
<p>
  
```
public static void main(String args[]){
    int arr[] = {2,4,5,9,6,7,4};
    for(int i=0;i<arr.length;i++){
        for(int j=i+1;j<arr.length;j++){
            if(arr[i]<arr[j]){
                arr[i] = arr[i]+arr[j];
                arr[j] = arr[i]-arr[j];
                arr[i] = arr[i]-arr[j];
            }
         }
     }
     System.out.println(arr[1]);//secound largest
     System.out.println(arr[2]);//thrid largest
}
```
</p>
</details>  

<details>
<summary>2. Reverse sentence words </summary>
<p>
  
```
public static void main(String args[]){
    String input = "my name is Rajesh";
    String[] inputArr = input.split(" ");
    String output="";
    for(int i=inputArr.length-1; i>=0; i--){
        if(i<inputArr.length) output+=" "; 
        output+=inputArr[i];
    }
    System.out.println(output);
}
```
</p>
</details>  
