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

