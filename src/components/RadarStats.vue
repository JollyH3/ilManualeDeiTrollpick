<script setup>
import { computed } from 'vue'
import { Sword, Shield, Zap, Footprints, Trophy } from 'lucide-vue-next'

const props = defineProps({
  stats: {
    type: Array,
    default: () => [],
  },
})

const defaultStats = [
  {
    name: 'Damage',
    icon: Sword,
    value: 8,
    color: '#EF4444',
    gradientId: 'damageGradient',
    bgColor: 'bg-red-500',
  },
  {
    name: 'Defense',
    icon: Shield,
    value: 3,
    color: '#3B82F6',
    gradientId: 'toughnessGradient',
    bgColor: 'bg-blue-500',
  },
  {
    name: 'CrowdControl',
    icon: Zap,
    value: 2,
    color: '#8B5CF6',
    gradientId: 'ccGradient',
    bgColor: 'bg-purple-500',
  },
  {
    name: 'Mobility',
    icon: Footprints,
    value: 1,
    color: '#10B981',
    gradientId: 'mobilityGradient',
    bgColor: 'bg-green-500',
  },
  {
    name: 'Utility',
    icon: Trophy,
    value: 5,
    color: '#F59E0B',
    gradientId: 'utilityGradient',
    bgColor: 'bg-orange-500',
  },
]

const championStats = computed(() => {
  if (props.stats.length > 0) {
    return props.stats.map((stat, index) => ({
      ...defaultStats[index], // Mantieni icone e colori
      ...stat,
      value: Math.min(stat.value * 3.33, 10),
    }))
  }
  return defaultStats
})

const overallRating = computed(() => {
  const avg =
    championStats.value.reduce((sum, stat) => sum + stat.value, 0) / championStats.value.length
  return Math.round(avg * 10) / 10
})

const getArcPath = (index, value) => {
  const totalStats = championStats.value.length
  const anglePerStat = (2 * Math.PI) / totalStats
  const startAngle = index * anglePerStat - Math.PI / 2
  const endAngle = (index + 1) * anglePerStat - Math.PI / 2

  const maxRadius = 90
  const minRadius = 20
  const radius = minRadius + (value / 10) * (maxRadius - minRadius)

  // ✅ Centro spostato a (140, 140)
  const centerX = 140
  const centerY = 140

  const x1 = centerX + Math.cos(startAngle) * minRadius
  const y1 = centerY + Math.sin(startAngle) * minRadius
  const x2 = centerX + Math.cos(endAngle) * minRadius
  const y2 = centerY + Math.sin(endAngle) * minRadius
  const x3 = centerX + Math.cos(endAngle) * radius
  const y3 = centerY + Math.sin(endAngle) * radius
  const x4 = centerX + Math.cos(startAngle) * radius
  const y4 = centerY + Math.sin(startAngle) * radius

  const largeArc = anglePerStat > Math.PI ? 1 : 0

  return `
    M ${x1} ${y1}
    A ${minRadius} ${minRadius} 0 ${largeArc} 1 ${x2} ${y2}
    L ${x3} ${y3}
    A ${radius} ${radius} 0 ${largeArc} 0 ${x4} ${y4}
    Z
  `
}

const getSeparatorPoint = (index) => {
  const totalStats = championStats.value.length
  const angle = (index * 2 * Math.PI) / totalStats - Math.PI / 2
  return {
    x: 140 + Math.cos(angle) * 90,
    y: 140 + Math.sin(angle) * 90,
  }
}

const getIconPosition = (index) => {
  const totalStats = championStats.value.length
  const angle = ((index + 0.5) * 2 * Math.PI) / totalStats - Math.PI / 2
  return {
    x: 140 + Math.cos(angle) * 120, // ✅ Più distante per non essere tagliato
    y: 140 + Math.sin(angle) * 120,
  }
}
</script>

<template>
  <div class="w-full max-w-lg mx-auto p-4 sm:p-6">
    <div class="relative aspect-square">
      <!-- ✅ Aspect ratio quadrato -->
      <svg viewBox="0 0 280 280" class="w-full h-full bg-trasparent">
        <!-- Definizioni gradients -->
        <defs>
          <linearGradient id="damageGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color: #ef4444" stop-opacity="0.8" />
            <stop offset="100%" style="stop-color: #dc2626" stop-opacity="0.4" />
          </linearGradient>

          <linearGradient id="toughnessGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color: #3b82f6" stop-opacity="0.8" />
            <stop offset="100%" style="stop-color: #2563eb" stop-opacity="0.4" />
          </linearGradient>

          <linearGradient id="ccGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color: #8b5cf6" stop-opacity="0.8" />
            <stop offset="100%" style="stop-color: #7c3aed" stop-opacity="0.4" />
          </linearGradient>

          <linearGradient id="mobilityGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color: #10b981" stop-opacity="0.8" />
            <stop offset="100%" style="stop-color: #059669" stop-opacity="0.4" />
          </linearGradient>

          <linearGradient id="utilityGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color: #f59e0b" stop-opacity="0.8" />
            <stop offset="100%" style="stop-color: #d97706" stop-opacity="0.4" />
          </linearGradient>

          <filter id="glow">
            <feGaussianBlur stdDeviation="3" result="coloredBlur" />
            <feMerge>
              <feMergeNode in="coloredBlur" />
              <feMergeNode in="SourceGraphic" />
            </feMerge>
          </filter>
        </defs>

        <!-- Cerchi background -->
        <circle
          cx="140"
          cy="140"
          r="30"
          fill="none"
          stroke="#1E293B"
          stroke-width="1"
          opacity="0.5"
        />
        <circle
          cx="140"
          cy="140"
          r="50"
          fill="none"
          stroke="#334155"
          stroke-width="1"
          opacity="0.7"
        />
        <circle
          cx="140"
          cy="140"
          r="70"
          fill="none"
          stroke="#475569"
          stroke-width="1.5"
          opacity="0.8"
        />
        <circle
          cx="140"
          cy="140"
          r="90"
          fill="none"
          stroke="#64748B"
          stroke-width="2"
          opacity="0.3"
        />

        <!-- Segmenti -->
        <g v-for="(stat, index) in championStats" :key="stat.name">
          <path
            :d="getArcPath(index, stat.value)"
            :fill="`url(#${stat.gradientId})`"
            :stroke="stat.color"
            stroke-width="2"
            filter="url(#glow)"
            class="transition-all duration-500 hover:opacity-80 cursor-pointer"
          />
        </g>

        <!-- Linee separatrici -->
        <line
          v-for="(stat, index) in championStats"
          :key="index + 'line'"
          x1="140"
          y1="140"
          :x2="getSeparatorPoint(index).x"
          :y2="getSeparatorPoint(index).y"
          stroke="#475569"
          stroke-width="1"
          opacity="0.6"
        />

        <!-- Centro -->
        <circle
          cx="140"
          cy="140"
          r="8"
          fill="#06B6D4"
          stroke="white"
          stroke-width="3"
          filter="url(#glow)"
        />

        <!-- Icone (più distanti per non essere tagliate) -->
        <foreignObject
          v-for="(stat, index) in championStats"
          :key="stat.name"
          :x="getIconPosition(index).x - 18"
          :y="getIconPosition(index).y - 18"
          width="40"
          height="40"
          class="flex items-center justify-center"
        >
          <div
            class="flex items-center justify-center w-9 h-9 rounded-full bg-gray-900/90 backdrop-blur-sm border-2 border-gray-600 shadow-lg transition-transform hover:scale-110 overflow-visible"
          >
            <component :is="stat.icon" :size="20" :style="`color: ${stat.color}`" />
          </div>
        </foreignObject>
      </svg>

      <!-- Rating centrale overlay -->
      <!-- <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="text-center">
          <div class="text-lg sm:text-xl lg:text-2xl font-bold text-white mb-1">
            {{ overallRating }}
          </div>
          <div class="text-xs sm:text-sm text-cyan-400 uppercase tracking-wide font-medium">
            Overall
          </div>
        </div>
      </div> -->
    </div>
  </div>
</template>
