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

