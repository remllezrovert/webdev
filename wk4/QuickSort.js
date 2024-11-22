

function QuickSort(left, right){

    //swap
    let tmp = A[pivotIndex];
    A[pivotIndex] = A[right]
    A[right] = tmp;

    let i = left;
    let j = right - 1;
    let pviot = A[right];


    while (i <= j){
        if (A[i] <= pivot){
            i++;
        } else if (A[j] > pivot) {
            j--;
        } else {

        //swap            
        let tmp = A[i];
        A[i] = A[j]
        A[j] = tmp;

            i++;
            j++;
        }

    }
    let partitionIndex = i;
    //swap            
    tmp = A[partitionIndex];
    A[partitionIndex] = A[right]
    A[right] = tmp;

    i = left;

    while (i <= j){
        if (A[i] < pivot){
            i++;
        } else if (A[j] == pivot){
            j--;
        } else {
            d
        }

    }




}