import java.util.*;

public class tarefaMochila {
    
    static class Item {
        int weight;
        int value;

        public Item(int weight, int value) {
            this.weight = weight;
            this.value = value;
        }
    }

    public static void main(String[] args) {
        
        Item[] items = {
            new Item(2, 10),
            new Item(3, 7),
            new Item(4, 14),
            new Item(5, 5),
            new Item(6, 3)
        };
        int capacity = 10;

        
        int tabuSize = 5;
        int maxIterations = 1000;

        
        int[] solution = tabu_search_knapsack(items, capacity, tabuSize, maxIterations, capacity);

        
        System.out.println("Itens selecionados:");
        for (int i = 0; i < items.length; i++) {
            if (solution[i] == 1) {
                System.out.println("Item " + (i+1) + ": Peso = " + items[i].weight + ", Valor = " + items[i].value);
            }
        }
    }

    
    static int[] tabu_search_knapsack(Item[] items, int capacity, int tabuSize, int maxIterations, int totalWeight) {
        int[] currentSolution = generate_random_solution(items.length);
        int[] bestSolution = Arrays.copyOf(currentSolution, currentSolution.length);
        int currentCost = cost_function(currentSolution, items, totalWeight);
        int bestCost = currentCost;
        List<int[]> tabuList = new LinkedList<>();

        for (int iter = 0; iter < maxIterations; iter++) {
            List<int[]> neighbors = generate_neighbors(currentSolution);
            int[] nextSolution = null;
            int nextCost = Integer.MIN_VALUE;

            for (int[] neighbor : neighbors) {
                if (!tabuList.contains(neighbor)) {
                    int neighborCost = cost_function(neighbor, items, totalWeight);
                    if (neighborCost > nextCost) {
                        nextSolution = neighbor;
                        nextCost = neighborCost;
                    }
                }
            }

            if (nextSolution == null) {
                break;
            }

            currentSolution = nextSolution;
            currentCost = nextCost;

            if (currentCost > bestCost) {
                bestSolution = Arrays.copyOf(currentSolution, currentSolution.length);
                bestCost = currentCost;
            }

            tabuList.add(nextSolution);
            if (tabuList.size() > tabuSize) {
                tabuList.remove(0);
            }
        }

        return bestSolution;
    }

    
    static int[] generate_random_solution(int size) {
        int[] solution = new int[size];
        Random rand = new Random();
        for (int i = 0; i < size; i++) {
            solution[i] = rand.nextInt(2); 
        }
        return solution;
    }

    
    static int cost_function(int[] solution, Item[] items, int totalWeight) {
        int totalValue = 0;
        int currentWeight = 0;
        for (int i = 0; i < solution.length; i++) {
            if (solution[i] == 1) {
                totalValue += items[i].value;
                currentWeight += items[i].weight;
            }
        }
        
        if (currentWeight > totalWeight) {
            totalValue = 0;
        }
        return totalValue;
    }

    
    static List<int[]> generate_neighbors(int[] solution) {
        List<int[]> neighbors = new ArrayList<>();
        for (int i = 0; i < solution.length; i++) {
            int[] neighbor = Arrays.copyOf(solution, solution.length);
            
            neighbor[i] = (neighbor[i] == 0) ? 1 : 0;
            neighbors.add(neighbor);
        }
        return neighbors;
    }
}
