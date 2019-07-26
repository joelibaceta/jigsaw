# = Game 01: Solutions
# 
# Let M be a not empty set of integer numbers, 
# find the first subset of 2 numbers of M which sum N.
# For instance, let's say we've got a set of number [5, 2, 8, 14, 0] 
# and N = 10, the resulting subset should be [2, 8].
#
# == Challenge
#
# You're required to create a function that receives an array (M) 
# and integer value (N), this function has to return an array 
# of the first possible solution


##
# A classic implementation using an iteration bucle for n-1 elements
# 
# Return nil if don't find a solution
#
def iteration_way(m, n)
    (0..(m.count - 2)).each do |i|
        if (m[i] + m[i+1] == n)
            return [m[i], m[i+1]]
        end
    end
    return nil
end

##
# A minimal version of classic way
# 
# Return nil if don't find a solution
#
def iteration_way_min(m, n)
    (0..(m.count-2)).each {|i| 
        (return [m[i], m[i+1]]) if (m[i]+m[i+1] == n)}
    return nil
end

##
# A ruby way implementation using a native iteration 
# using the reduce accumulator to save the last element
# 
# Return nil if don't find a solution
#
def reduce_way(m, n)
    m.reduce(0) do |last, i| 
        if last+i == n 
            return [last, i]
        else
            last = i
        end
    end
    return nil
end

##
# A minimal version of reduce way
# 
# Return nil if don't find a solution
#
def reduce_way_min(m, n)
    m.reduce(0) { |l, i|  l+i == n ? (return [l, i]) : l = i }
    return nil
end