# 버튼 움직임 벤치마킹 메모

조사일: 2026-10-23. 디자인 분류와 동작 원리만 참고했고 CSS·HTML은 새로 작성했습니다.

| 참고 | 관찰한 요소 | 이번 구현에 반영 |
| --- | --- | --- |
| [꿀팁매거진 비짓재팬 안내 글](https://honeytipmagazine.com/%eb%b9%84%ec%a7%93%ec%9e%ac%ed%8c%ac-%eb%93%b1%eb%a1%9d%eb%b0%a9%eb%b2%95-%ec%9d%bc%eb%b3%b8%ec%97%ac%ed%96%89-%ec%a4%80%eb%b9%84%eb%ac%bc-%ec%82%ac%ec%9d%b4%ed%8a%b8-%ec%9b%b9-%ec%95%88%eb%82%b4/) | 가운데 놓인 큰 CTA, 진한 색, 선명한 화살표 | 네이비 기반과 시각적 무게, 가운데 정렬 |
| [꿀팁매거진 디지털온누리상품권 환불 글](https://honeytipmagazine.com/%eb%94%94%ec%a7%80%ed%84%b8%ec%98%a8%eb%88%84%eb%a6%ac%ec%83%81%ed%92%88%ea%b6%8c-%ed%99%98%eb%b6%88-%eb%b0%a9%eb%b2%95-2026/) | 실제 `honey-cta` 버튼은 데스크톱에서 480×64px, 남색 그라데이션, 14px 모서리와 선명한 그림자. 본문에 공식 FAQ로 가는 CTA 세 개가 흩어져 있음 | 480px 상한과 기사 중간에 놓일 때의 가독성, 문구와 도착지의 일치 |
| [Apple iPhone 공식 페이지](https://www.apple.com/kr/iphone/) | 제품별 `더 알아보기`와 `구입하기`를 짧고 분명한 별도 행동으로 표시 | 버튼 문구를 추상적인 `클릭` 대신 목적지에 맞게 쓰기 |
| [Stripe 공식 홈](https://stripe.com/) | `Start now`와 `Contact sales`를 서로 다른 목적의 CTA로 나란히 둠 | 주요 행동의 시각적 우선순위와 두 번째 선택지의 절제 |
| [GitHub Primer Button](https://primer.style/product/components/button/) | Primary 스타일은 가장 우선인 행동에 제한해 사용하도록 설명 | 본문에 강한 CTA를 무분별하게 반복하지 않기 |
| [GOV.UK Design System Button](https://design-system.service.gov.uk/components/button/) | 버튼 문구가 수행할 행동을 설명하도록 권고 | `공식 FAQ 보기`처럼 도착 후 할 일을 드러내는 문구 |
| [Atlassian Design motion tokens](https://atlassian.design/components/tokens) | 버튼 호버 같은 작은 반응에 짧은 지속 시간 토큰을 사용 | 이동은 빠르게 끝내고, 큰 장식 효과는 1회만 재생 |
| [Hover.css 공식 데모](https://ianlunn.github.io/Hover/) | 2D 이동, 배경 전환, 아이콘 이동, 테두리 전환 등 효과 분류 | 네 가지 서로 다른 반응으로 묶어 비교 가능하게 설계 |
| [Animista 공식 사이트](https://animista.net/) | 미리보기에서 지속 시간과 easing을 조절하며 동작 선택 | 0.34~0.62초 범위의 짧은 1회 반응 |
| [MDN CSS transition](https://developer.mozilla.org/en-US/docs/Learn_web_development/Howto/Solve_CSS_problems/Transition_button) | 상태 간 변화를 transition으로 부드럽게 연결 | 이동·색상·그림자 전환 |
| [MDN prefers-reduced-motion](https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/At-rules/%40media/prefers-reduced-motion) | 사용자의 모션 축소 설정 감지 | 불필요한 애니메이션과 이동 제거 |
| [WordPress 패턴 등록 문서](https://developer.wordpress.org/themes/patterns/registering-patterns/) | `register_block_pattern()`과 패턴 카테고리 | 추가 4종을 독립 플러그인 패턴으로 등록 |

## 선택한 원칙

1. 움직임은 효과마다 한 가지 주 반응을 갖도록 분리했습니다. 버튼을 계속 흔들지 않습니다.
2. 배경·텍스트 대비와 포커스 표시가 애니메이션보다 우선입니다.
3. 원본 4종과 새 색상 4종의 실제 사이트 등록 상태를 명확히 구분했습니다.
4. GIF는 노션에서 모양을 보여 주기 위한 미리보기입니다. 실제 클릭 가능한 버튼은 데모와 워드프레스 패턴입니다.

Hover.css의 최신 버전은 상업적 사용에 별도 라이선스 조건이 있을 수 있어 그 코드를 포함하지 않았습니다. Animista 코드도 포함하지 않았습니다.
