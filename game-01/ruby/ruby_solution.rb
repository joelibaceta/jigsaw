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

module Solver
    
    ##
    # A classic implementation using an iteration bucle for n-1 elements
    # 
    # Return nil if don't find a solution
    #
    def iteration_way(m, n)
        (0..(m.count - 1)).each do |i|
            ((i+1)..(m.count - 1)).each do |j|
                if (m[i] + m[j] == n)
                    return [m[i], m[j]]
                end
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
        (0..(m.count-1)).each {|i| 
            ((i+1)..(m.count-1)).each {|j| 
                (return [m[i], m[j]]) if (m[i]+m[j] == n)}}
        return nil
    end

    ##
    # A ruby way implementation using a native iteration 
    # using the reduce accumulator to save the last element
    # 
    # Return nil if don't find a solution
    #
    def reduce_way(m, n)
        m.reduce(0) do |index, i| 
            m.drop(index+1).each do |j|
                if (i + j) == n
                    return [i, j]
                end
            end
            index +=1
        end
        return nil
    end

    ##
    # A minimal version of reduce way
    # 
    # Return nil if don't find a solution
    #
    def reduce_way_min(m, n)
        m.reduce(0) { |i, x| m.drop(i+1).each {|y| return [x, y] if (x + y) == n }; i +=1 }
        return nil
    end
end