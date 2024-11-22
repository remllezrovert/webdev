


<?php


#T(n) = 2( t(n/2) + \theta (n log n))
# \theta (n log^2 n)
#preprocess
#sort points by x using merge-sort

##baseCase 


##find closest(points[], left,right)
    ## c is a constant
    $n = right - left + 1;
    if (n <= 8) brute force and find closest in [left,right]
        return clostPair;
    
        mid = (left + right) / 2;
        xMedian = x.points[mid]

        <pl,ql = find(closest(points, left,mid));
        <pr, qr> = find closest(points, mid + 1, right);


        dot, d = minimum of dl and dr



        dist(pl, ql) and dr = dist(pr,qr)

        strip = empty;

        for each point in [left,right]{
            if (xMedian  -d <= pointx; pointx <= mediant + d){
                strip.add(point);
            }
        }
        sort strip using mergesort base on y

        ##this for loop takes O(n) time because inner loop is o(1)
        for (i=0; sizeof(strip)-1){
            for ($j = i + 1;minimum(i + 7,strip.length - 1)){
                x = dist(strip[i],strip[j]) ;
                if (x < min){
                    min = x;
                    pair = <i,j>;
                }
            }
        }


        if (min < d) return pair;
        if (dl < dr) return <pl, ql>;
        return <pr,qr>;





?>