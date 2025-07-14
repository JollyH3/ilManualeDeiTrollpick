<!-- eslint-disable vue/multi-word-component-names -->
<script setup>
import { ref } from 'vue'
import Menubar from 'primevue/menubar'

const items = ref([
  {
    label: 'Home',
    icon: 'pi pi-home',
    route: '/',
  },
  {
    label: 'Champion',
    icon: 'pi pi-users',
    route: '/champions',
  },
])
</script>
<template>
  <div class="card">
    <Menubar :model="items">
      <template #start>
        <img src="@/assets/images/logo.png" width="35" height="40" class="size-8 rounded-lg" />
      </template>

      <template #item="{ item, props, hasSubmenu, root }">
        <router-link
          v-if="item.route"
          :to="item.route"
          v-ripple
          class="flex items-center"
          v-bind="props"
        >
          <i v-if="item.icon" :class="[item.icon, 'mr-2']"></i>
          <span>{{ item.label }}</span>
          <Badge
            v-if="item.badge"
            :class="{ 'ml-auto': !root, 'ml-2': root }"
            :value="item.badge"
          />
        </router-link>

        <a v-else v-ripple class="flex items-center" v-bind="props">
          <i v-if="item.icon" :class="[item.icon, 'mr-2']"></i>
          <span>{{ item.label }}</span>
          <Badge
            v-if="item.badge"
            :class="{ 'ml-auto': !root, 'ml-2': root }"
            :value="item.badge"
          />
          <span
            v-if="item.shortcut"
            class="ml-auto border border-surface rounded bg-emphasis text-muted-color text-xs p-1"
            >{{ item.shortcut }}</span
          >
          <i
            v-if="hasSubmenu"
            :class="[
              'pi pi-angle-down ml-auto',
              { 'pi-angle-down': root, 'pi-angle-right': !root },
            ]"
          ></i>
        </a>
      </template>

      <template #end>
        <div class="flex items-center gap-2">
          <InputText placeholder="Search" type="text" class="w-32 sm:w-auto" />
          <Avatar
            image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png"
            shape="circle"
          />
        </div>
      </template>
    </Menubar>
  </div>
</template>
