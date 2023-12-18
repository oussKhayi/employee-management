<x-admin-dashboard>
    <div class="relative w-full overflow-auto">

        <table class="w-full caption-bottom text-sm">
          <thead class="[&amp;_tr]:border-b">
            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 w-[100px]">
                CIN
              </th>
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 min-w-[150px]">
                Name
              </th>
              <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">
                Position
              </th>
              <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right">
                Actions
              </th>
            </tr>
          </thead>
          <tbody class="[&amp;_tr:last-child]:border-0">
            @foreach ($employee as $emp)
              
            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
              <td class="uppercase p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-medium">{{$emp->cin}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0">{{$emp->first_name}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 hidden md:table-cell">{{$emp->working_time}}</td>
              <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right">
                <a href="#" class="border rounded-lg p-1">Details</a>
                <a href="#" class="border rounded-lg p-1">Static</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
          </div>
  </div>
</x-admin-dashboard>